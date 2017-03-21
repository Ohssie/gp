<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class Account extends Controller
{
    protected $username, $phone;
    
    public function login(Request $request)
    {
        $rules = [
            'login' => 'required|min:2',
            'password' => 'required|min:4'
        ];

        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            if (Auth::attempt(['username' => $request->login, 'password' => $request->password]))
            {
               return redirect()->intended(Auth::user()->isAdmin() ? 'admin/dashboard' : 'dashboard');
            } 
            
            elseif (Auth::attempt(['phone'=> $request->login, 'password' => $request->password]))
            {
                return redirect()->intended(Auth::user()->isAdmin() ? 'admin/dashboard' : 'dashboard'); 
            }
            
            
            else {
                return Redirect::away('/account/login?');
            }
        }
    }
    
    public function signup(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:50',
            'phone' => 'required|unique:users|max:11|min:11',
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|max:14',
        ]);
        
        
        if($validator->fails())
        {
            return redirect('account/signup')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $username = generate_username($request->get('name'), '.');
        $password = generate_token(6);
        $message_text = "Your " . config('settings.app_name') . " user account details are:\nUsername: {$username}\nPassword: {$password}\nPlease login to your account with this details at " . url('');
        
        if (User::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($password),
            'username' => $username,
            'bank_name' => $request->get('bank_name'),
            'account_name' => $request->get('account_name'),
            'account_number' => $request->get('account_number')
        ]) && send_sms($request->get('phone'), $message_text, $flash = 0, config('settings.app_name')))
        {
            \Session::flash('signup_success', 'Account created successfully! We have sent your login details to ' . $request->get('phone'));
        }
        return Redirect::away('/account/login');
    }

    public function logout()
    {
        Auth::logout();
        
        return Redirect::away('login');
    }
}
