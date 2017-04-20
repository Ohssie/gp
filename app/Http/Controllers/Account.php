<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Referral;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class Account extends Controller
{
    protected $username, $phone;
    
    public function login(Request $request)
    {
        $validate = $this->validate($request, [
            'login' => 'required|min:2',
            'password' => 'required|min:4',
        ]);
        
        /*$rules = array(
            'login' => 'required|min:2',
            'password' => 'required|min:4'
        );
        $validator = Validator::make(Input::all(), $rules);
        if (!$validate) {
            return back()
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        } else {*/
           if (Auth::attempt(['username' => $request->login, 'password' => $request->password, 'status' => 'blocked'])) {
                
                return Redirect::to('/account/login')
                        ->withInput(Input::except('password'))
                        ->with('login_error', 'Your account has been suspended. Contact the admin on (citisumo@gmail.com) to clarify the issue.');
                        
            }
            
            if (Auth::attempt(['phone'=> $request->login, 'password' => $request->password, 'status' => 'blocked'])) {
                
                return Redirect::to('/account/login')
                        ->withInput(Input::except('password'))
                        ->with('login_error', 'Your account has been suspended. Contact the admin on (citisumo@gmail.com) to clarify the issue.');
                        
            }
            
            if (Auth::attempt(['username' => $request->login, 'password' => $request->password])) {
                
              return redirect()->intended(Auth::user()->isAdmin() ? 'admin/dashboard' : 'dashboard');
               
            } elseif (Auth::attempt(['phone'=> $request->login, 'password' => $request->password])) {
                
                return redirect()->intended(Auth::user()->isAdmin() ? 'admin/dashboard' : 'dashboard'); 
                
            } else {
                return Redirect::to('/account/login')
                        ->withInput(Input::except('password'))
                        ->with('login_error', 'Wrong Credentials, Try again.');
            }
        // }
    }
    
    public function signup(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required|max:50',
            'username' => 'unique:users,username',
            'phone' => 'required|unique:users|max:11|min:11',
            'email' => 'required',
            'gender' => 'required',
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|max:14',
		]);
		
// 		dd($request);
        
        
        // if($validator->fails())
        // {
        //     return back()->withInput()
        //                 ->with('error', 'There was a problem signing up, Try again!');
        // } 
        
        $username = $request->get('username');
        $password = generate_token(6);
        $message_text = "Your " . config('settings.app_name') . " user account details are:\nUsername: {$username}\nPassword: {$password}\nPlease login to your account with this details at " . url('');
        
        if (User::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($password),
            'username' => $username,
            'gender' => $request->get('gender'),
            'email' => $request->get('email'),
            'phone2' => $request->get('phone2'),
            'bank_name' => $request->get('bank_name'),
            'account_name' => $request->get('account_name'),
            'account_number' => $request->get('account_number')
        ]) && send_sms($request->get('phone'), $message_text, $flash = 0, config('settings.app_name')))
        {
            \Session::flash('signup_success', 'Account created successfully! We have sent your login details to ' . $request->get('phone'));
        }
        return Redirect::away('/account/login');
    }
    
    public function referrals ($username) {
        return view('refsignup')->with('username', $username);
    }
    
    //Signup function for referrals
    public function refSignup(Request $request) {
        
        $validator = $this->validate($request, [
            'name' => 'required|max:50',
            'username' => 'unique:users,username',
            'phone' => 'required|unique:users|max:11|min:11',
            'email' => 'required',
            'gender' => 'required',
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|max:14',
		]);
        
        // if($validator->fails())
        // {
        //     return redirect('account/signup')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        
        $username = $request->get('username');
        $password = generate_token(6);
        $message_text = "Your " . config('settings.app_name') . " user account details are:\nUsername: {$username}\nPassword: {$password}\nPlease login to your account with this details at " . url('');
        
        $newRegisteredUser = User::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($password),
            'username' => $username,
            'gender' => $request->get('gender'),
            'email' => $request->get('email'),
            'phone2' => $request->get('phone2'),
            'bank_name' => $request->get('bank_name'),
            'account_name' => $request->get('account_name'),
            'account_number' => $request->get('account_number')
        ]);
        
        if (!is_null($newRegisteredUser) && send_sms($request->get('phone'), $message_text, $flash = 0, config('settings.app_name')))
        {
            \Session::flash('signup_success', 'Account created successfully! We have sent your login details to ' . $request->get('phone'));
            
            if($request->referee) {
                $ref = new Referral;
                $ref->referee = $request->get('referee');
                $ref->referral = $newRegisteredUser->username;
                $ref->save();
            }
        }
        return Redirect::away('/account/login');
    }
    
    public function pwordChange() {
        return view('users.password');
    }
    
    public function changePassword(Request $request) {
        $user = Auth::user();
        
        if ($request->old_password && $request->new_password) {
            $user->password = bcrypt($request->new_password);
            $user->save();
            return back()
                ->with('message', 'Password successfully changed!');
        } else {
            return back()->with('message', 'Incorrect old password');
        }
        
    }
    
    public function forgotPass(Request $request)
    {
        $validator = \Validator::make(Input::all(), [
            'phone' => 'required|min:11|max:11'
        ]);
        if($validator->fails()) {
            return Redirect::to(url('account/login?ca=validation_error'))
                ->withErrors($validator)
                ->withInput();
        }
        
        $user = User::where('phone', $request->get('phone'));
        if($user->exists())
        {
            $password = generate_token(6);
            $message_text = "Your " . config('settings.app_name') . " user account details are:\nUsername: " . $user->first()->username . "\nPassword: {$password}\nPlease login to your account with this details at " . url('');
            if(send_sms($request->get('phone'), $message_text, $flash = 0, config('settings.app_name')))
            {
                $user->update(['password' => bcrypt($password)]);
                return Redirect::away(url('account/login'))->with('message', 'Your new login details have been sent to ' . $request->get('phone'));
            }
        }
        return Redirect::away(url('account/login'));
    }

    public function logout()
    {
        Auth::logout();
        
        return Redirect::away('login');
    }
}
