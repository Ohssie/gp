<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class Front extends Controller
{
    protected $username, $phone;
    
    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->login, 'password' => bcrypt($request->password)])) {
           return redirect()->intended('dashboard');
        } 
        
        elseif (Auth::attempt(['phone'=> $request->login, 'password' => bcrypt($request->password)])) {
            return redirect()->intended('dashboard'); 
        }
        
        
        else {
            return Redirect::away('login?')->withErrors($validator);
        }
    }
    
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'phone' => 'required|unique:users|unique:admin|max:11',
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|max:14',
        ]);
        
        
        if($validator->fails())
        {
            return redirect('signup')
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
        return Redirect::away('login');
    }
    
    public function logout()
    {
        Auth::logout();
        
        return Redirect::away('login');
    }
}
