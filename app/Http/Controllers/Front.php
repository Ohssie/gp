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
            return redirect('packages/choose')->with('subscribe_error', 'You have already subscribed to this package and are yet to circle out.');
        }

        $package = \App\Package::find($request->get('package_id'));

        $as = $package->size - 1;

        $upline = collect(\DB::select("SELECT COUNT(ps.upline_username) as downlines, ps.username FROM package_subscription ps WHERE ps.username IN (SELECT u.username FROM users u WHERE u.role = 'admin') AND ps.package_id = {$request->get('package_id')} GROUP BY ps.username HAVING downlines < {$as} ORDER BY downlines DESC"))->first();
        if(!$upline)
        {
            $upline = collect(\DB::select("SELECT COUNT(upline_username) as countUsers, username FROM package_subscription WHERE package_id = {$request->get('package_id')} AND status = 'ongoing' GROUP BY username HAVING countUsers < {$package->size} ORDER BY countUsers DESC"))->first();   
        }
        $ps = new \App\PackageSub();
        $token = generate_token(10, true);
        $ps->package_id = $request->get('package_id');
        $ps->username = Auth::user()->username;
        $ps->upline_username = $upline->username;
        $ps->sub_key = $token;
        $ps->status = "incomplete";

        if($ps->save())
        {
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

            $message = $user->username . "claimed he deposited N{$package->cost} into your {$ps->uplineUser()->bank_name} account. Please dispute this payment before " . config('settings.delete_records_after') . " working days! Logon to " . url('');
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
        if(!$p->exists())
        {
            return \Redirect::away('account/login');
        }

        $p->update(['status' => 'disputed']);

        $payment = $p->first();
        $at = new DateTime($payment->created_at);
        $message = "{$payment->payee_username} disputed the payment you made on {$at->format('d, M')}. Please log on to " . url('/') . " to clarify this if it's a misunderstanding";
        send_sms(\App\User::where('username', $payment->payer_username)->first()->phone, $message, 0, config('settings.app_name'));
        return redirect('payment/claim/' . $sub_key);
    }


    public function dispute($sub_key)
    {
        $p = \App\Payment::where('sub_key', $sub_key)->where('payee_username', Auth::user()->username);
        if(!$p->exists())
        {
            return \Redirect::away('account/login');
        }

        $p->update(['status' => 'completed']);
        $payment = $p->first();
        $ps = \App\PackageSub::where('sub_key', $sub_key)->update(['status' => 'completed']);
        $at = new DateTime($payment->created_at);
        $message = "{$payment->payee_username} disputed the payment you made on {$at->format('d, M')}. Please log on to " . url('/') . " to clarify this if it's a misunderstanding";
        send_sms(\App\User::where('username', $payment->payer_username)->first()->phone, $message, 0, config('settings.app_name'));
        return redirect('payment/claim/' . $sub_key);
    }

}

//MZCnJy