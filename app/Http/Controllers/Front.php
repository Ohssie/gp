<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use DateTime;

class Front extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        if(!(\App\PackageSub::where('username', $user->username)->exists()))
        {
            return Redirect::intended('packages/choose');
        } else {
            $user = Auth::user();
            $data['sub_plans_num'] = \App\PackageSub::where([
                ['username', '=',  $user->username],
                ['status', '=', 'ongoing']
            ])->get()->count();
            //$data['pending_payment_amt'] = \DB::select('SUM(')
            $data['downlines_paired'] = collect(\DB::select("SELECT COUNT(username) AS downlines_paired from package_subscription WHERE upline_username = '{$user->username}'"))->first()->downlines_paired;

            $data['down_payments'] = \App\Payment::where('payee_username', $user->username)->where('status', 'waiting')->get();

            $data['up_payments'] = \App\PackageSub::where('username', $user->username)->where('status', 'incomplete')->get();

            $data['user'] = $user;
            return \View::make('users.dashboard', $data);
        }
    }

    public function choosePackage(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|exists:packages,package_id|numeric'
        ]);

        if($validator->fails())
        {
            return redirect('account/logout');
        }

        if(\App\PackageSub::where('username', $user->username)
            ->where('package_id', $request->get('package_id'))
            ->where(function($q)
                {
                    $q->where('status', 'incomplete')
                        ->orWhere('status', 'waiting');
                })
            ->exists())
        {
            return redirect($user->isAdmin() ? 'admin/packages/manage' : 'packages/choose')->with('subscribe_error', 'You have already subscribed to this package and are yet to circle out.');
        }

        $package = \App\Package::find($request->get('package_id'));

        $as = $package->size - 1;
        
        // Find the package head
        $upline = collect(\DB::select("SELECT username, sub_key FROM package_subscription WHERE package_id = {$request->get('package_id')} AND upline_username = '0' LIMIT 1"))->first();
        
        // Find the admin
        if($upline)
        {
            $upline = collect(\DB::select("SELECT ps.username, ps.sub_key FROM package_subscription ps WHERE
                ps.username IN
                    (SELECT us.username FROM users us WHERE us.role = 'admin')
                AND ps.package_id = 1 AND 
                    (SELECT COUNT(px.upline_username) FROM package_subscription px WHERE px.upline_username = ps.username AND px.up_sub_key = ps.sub_key AND px.package_id = ps.package_id)
                < IF((
                    (SELECT py.upline_username FROM package_subscription py WHERE py.username = ps.username AND py.package_id = ps.package_id ORDER BY py.sub_id DESC LIMIT 1)
                    IN
                    (SELECT us.username FROM users us WHERE us.role = 'admin')
                ), {$package->size()}, {$as})
                ORDER BY sub_id LIMIT 1"))->first();
        }
        
        // Find the person due
        if(!$upline)
        {
            $have_admin = $package->size + 1;
            $upline = collect(\DB::select("SELECT ps.username, ps.sub_key FROM package_subscription ps
            WHERE ps.package_id = {$request->get('package_id')} 
            AND (
                SELECT COUNT(px.upline_username) FROM package_subscription px 
                WHERE px.upline_username = ps.username AND px.up_sub_key = ps.sub_key AND px.package_id = ps.package_id
            ) < IF(
                (SELECT py.upline_username FROM package_subscription py 
                WHERE py.username = ps.username AND py.package_id = ps.package_id 
                ORDER BY py.sub_id DESC LIMIT 1) 
                IN 
                (SELECT us.username FROM users us WHERE us.role = 'admin')
                , {$have_admin}, {$package->size}
            ) ORDER BY sub_id LIMIT 1"))->first();
        }
        
        $number1 = Auth::user()->phone;
        $number2 = Auth::user()->phone2;
        
        
        $ps = new \App\PackageSub();
        $token = generate_token(10, true);
        $ps->package_id = $request->get('package_id');
        $ps->username = Auth::user()->username;
        $ps->upline_username = $upline->username;
        $ps->sub_key = $token;
        $ps->up_sub_key = $upline->sub_key;
        $ps->status = $user->isAdmin() ? "completed" : "incomplete";
        
        if($ps->save())
        {
            
            /*$message = $upline->username . ", you have been paired with {$ps->username} who is to pay the sum of N{$package->cost} into your {$ps->uplineUser()->bank_name} account. You can reach him/her on {$number1}/{$number2}. ";
            if(!send_sms($ps->uplineUser()->phone, $message, 0, config('settings.app_name')))
            {
               if(!send_sms($ps->uplineUser()->phone, $message, 0, config('settings.app_name')))
                {
                    \Session::flash('message', '');
                }
            }*/
            
            if($user->isAdmin())
                return redirect('admin/packages/subscription/' . $token)->with('message', 'You have been successfully paired up. The system will pair you up with priority!');
            return redirect('packages/subscription/' . $token)->with('message', 'You have successfully subscribed to ' . $package->name . ' package.');
        }

    }

    public function claim($sub_key)
    {
        $user = Auth::user();
        if(!\App\Payment::where('sub_key', $sub_key)->exists())
        {
            $ps = \App\PackageSub::where('sub_key', $sub_key)->first();
            $package = \App\Package::find($ps->package_id);
            $payment = new \App\Payment();
            $payment->sub_key = $sub_key;
            $payment->payee_username = $ps->upline_username;
            $payment->payer_username = $ps->username;
            $payment->status = "waiting";
            $payment->amount = $package->cost;

            $payment->save();

            $ps->status = "waiting";

            $ps->save();

            $message = $user->username . " claimed he deposited N{$package->cost} into your {$ps->uplineUser()->bank_name} account. Please dispute this payment before " . config('settings.delete_records_after') . " working days! Logon to " . url('');
            if(!send_sms($ps->uplineUser()->phone, $message, 0, config('settings.app_name')))
            {
               if(!send_sms($ps->uplineUser()->phone, $message, 0, config('settings.app_name')))
                {
                    \Session::flash('message', '');
                }
            }
            \Session::flash('message', 'Your claim was made successfully. Please wait for your uplink to confirm or dispute the payment. The maximun wait time is ' . config('settings.delete_records_after') . ' working days');
        }

        $payment = \App\Payment::where('sub_key', $sub_key)->first();

        $data['sub'] = \App\PackageSub::where('sub_key', $sub_key)->first();
        $data['user'] = Auth::user();
        $data['sub_key'] = $sub_key;
        $data['messages'] = [];
        $data['payment'] = $payment;
        $data['upline'] = $data['sub']->uplineUser();

        return view('users.claim', $data);
    }

    public function dispute($sub_key)
    {
        $p = \App\Payment::where('sub_key', $sub_key)->where('payee_username', Auth::user()->username);
        $ps = \App\PackageSub::where('sub_key', $sub_key)->where('upline_username', Auth::user()->username);
        if(!$p->exists() || !$ps->exists())
        {
            return \Redirect::away('account/login');
        }

        $p->update(['status' => 'waiting']);
        $ps->update(['status' => 'waiting']);

        $payment = $p->first();
        $at = new DateTime($payment->created_at);
        $message = "{$payment->payee_username} disputed the payment you made on {$at->format('d, M')}. Please log on to " . url('/') . " to clarify this if it's a misunderstanding";
        send_sms(\App\User::where('username', $payment->payer_username)->first()->phone, $message, 0, config('settings.app_name'));
        return redirect('payment/claim/' . $sub_key);
    }


    public function complete($sub_key)
    {
        $p = \App\Payment::where('sub_key', $sub_key)->where('payee_username', Auth::user()->username);
        $ps = \App\PackageSub::where('sub_key', $sub_key)->where('upline_username', Auth::user()->username);
        if(!$p->exists() || !$ps->exists())
        {
            return \Redirect::away('account/login');
        }

        $p->update(['status' => 'completed']);
        $payment = $p->first();
        $ps->update(['status' => 'completed']);
        $at = new DateTime($payment->created_at);
        $message = "{$payment->payee_username} confirmed the payment you made on {$at->format('d, M')} and you've been put out for pairing. Keep your phone close!";
        send_sms(\App\User::where('username', $payment->payer_username)->first()->phone, $message, 0, config('settings.app_name'));
        return redirect(Auth::user()->isAdmin() ? 'admin/dashboard' : 'dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        $data['downlines'] = \App\PackageSub::where('upline_username', $user->username)->get()->count();
        $data['received'] = \App\PackageSub::where('upline_username', $user->username)->where('status', 'completed')->get()->count();
        $data['packages'] = \App\PackageSub::distinct()->where('upline_username', $user->username)->get(['package_id'])->count();
        $data['user'] = $user;
        
        $total = 0;
        $refs = \App\Referral::where('referee', $user->username)->get();
        $counts = count($refs);
    
        foreach($refs as $ref) {
            $pack = \App\PackageSub::where('username', $ref->referral)->first();
            // dd($pack->package_id);
            $sub = \App\Package::where('package_id', $pack->package_id)->first();
            $bonus = ($sub->cost) * 0.05;
            $total += $bonus;
            
        }
        // return $total;
        
        return view('users.profile', $data)->with('total', $total);
    }
    

}

//MZCnJy