<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use DateTime;

class AdminController extends Controller
{

    public function createPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
            'cost' => 'required|numeric',
            'size' => 'required|numeric',
            'depth' => 'required|numeric',
            'color' => 'required|in:primary,warning,danger,success',
            'description' => 'required',
            'package_head' => 'required|exists:users,username'
        ]);

        if($validator->fails())
        {
            return redirect('packages/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $package = new \App\Package();

        $package->package_name = $request->get('package_name');
        $package->cost = $request->get('cost');
        $package->size = $request->get('size');
        $package->depth = $request->get('depth');
        $package->color = $request->get('color');

        if($package->save())
        {
            $package_id = $package->id;
            $ps = new \App\PackageSub();

            $ps->package_id = $package_id;
            $ps->username = $request->get('package_head');
            $ps->upline_username = "";
            $ps->sub_key = generate_token(10, true);
            $ps->status = "ongoing";

            if($ps->save())
            {
                $rcost = $request->get('cost') * $request->get('size');
                $message_text = "A new package has been created. Let " . $request->get('size') . " people pay you N" . $rcost . " by paying someone N" . $request->get('cost') . ". Log on to " . url('') . " now";
                $all_phone = User::select()->pluck('phone')->toArray();
                if(send_sms($all_phone, $message_text, 0, config('settings.app_name')))
                {
                    \Session::flash('create_package_success', 'Package created successfully');
                    return \Redirect::intended('packages/create');
                }
            }
        }
    }

    public function dashboard()
    {
    	$data['user'] = Auth::user();
    	$data['num_users'] = User::all()->count();
    	$data['pending_payment'] = \App\Payment::where('payee_username', Auth::user()->username)->where('status', '!=', 'completed')->limit(10)->get();
    	$data['approved_payments'] = \App\Payment::where('payee_username', Auth::user()->username)->where('status', 'completed')->limit(10)->get();
    	return view('admin.dashboard', $data);
    }

    public function settings(Request $request, \Illuminate\Contracts\Cache\Factory $cache)
    {
    	foreach ($request->all() as $key => $value) {
    		\App\Setting::where('name', $key)->update(['value' => $value]);
    	}

	    $cache->forget('settings');

	    return redirect('admin/settings')
	        ->with('message', 'Settings updated');
    }

    public function createUser(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required',
    		'phone' => 'required|unique:users|max:11|min:11',
    		'bank_name' => 'required',
    		'account_name' => 'required',
    		'account_number' => 'required',
    		'role' => 'required'
    	]);

    	if($validator->fails())
    	{
    		return redirect('admin/people/manage')
                        ->withErrors($validator)
                        ->withInput();
    	}

    	$username = generate_username($request->get('name'), '.');
    	$password = generate_token(6);
    	$message_text = "An account has been created for you with details as:\nUsername: {$username}\nPassword: {$password}\nPlease login to your account with this details as " . url();
    	
    	if (User::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($password),
            'username' => $username,
            'bank_name' => $request->get('bank_name'),
            'account_name' => $request->get('account_name'),
            'account_number' => $request->get('account_number'),
            'role' => $request->get('role')
        ]) && send_sms($request->get('phone'), $message_text, $flash = 0, config('settings.app_name')))
        {
            \Session::flash('message', 'Account created successfully! We have sent your login details to ' . $request->get('phone'));
        }
        return Redirect::intended('admin/people/manage');
    }

    public function userGrowth()
    {
    	$min_date = User::where('role', 'user')->min('updated_at');
    	$now = new DateTime();

    	$max_date = $now->format('Y-m-d H:i:s');
    	$time_range = $this->_date_range($min_date, $max_date);
    	$data = [];

    	foreach ($time_range as $time) {
    		$q = collect(\DB::select("select count(*) as total, DATE_FORMAT('{$time['start']}', '%d/%m/%Y,{$this->specifier}') as specifier from users where updated_at >= '{$time['start']}' and updated_at < '{$time['end']}'"))->first();
    		$data[] = [$q->specifier, (int) $q->total];
    	}

    	return response()->json(['dataBar' => $data, 'dataLine' => $data]);
    }

    public function planStats()
    {
    	$min_date = \App\PackageSub::select('*')->min('created_at');
    	$now = new DateTime();

    	$max_date = $now->format('Y-m-d H:i:s');
    	$time_range = $this->_date_range($min_date, $max_date);
    	$data = [];
    	$packages = \App\Package::all();
    	foreach ($packages as $pkg) {
    		foreach ($time_range as $time) {
    			$q = collect(\DB::select("select count(*) as total, DATE_FORMAT('{$time['start']}', '%d/%m/%Y, {$this->specifier}') as specifier from package_subscription where created_at >= '{$time['end']}' and package_id = {$pkg->package_id}"))->first();
    			$data[$pkg->package_name][] = [$q->specifier, (int) $q->total];
    		}
    	}

    	return response()->json($data);
    }

    private function _date_range( $first, $last, $format = 'Y-m-d' ) {
        
        $min_date = new DateTime($first);
        $max_date = new DateTime($last);
        
        $months = $min_date->diff($max_date)->m;
        $days = $min_date->diff($max_date)->d;
        
        $step = "+1 day";
        
        if($days <= 12) {
            $step = "+1 day";
            $this->specifier = "D";
        }
        
        elseif($days > 12 && $days <= 60) {
            $step = "+1 week";
            $this->specifier = "W";
        }
        
        elseif($days > 60 && $months <= 12 ) {
            $step = "+1 month";
            $this->specifier = "M";
        }
        
        elseif($months > 12 && $months <= 24) {
            $step = "+2 month";
            $this->specifier = "M";
        }
        
        elseif($months > 24 && $months <= 48) {
            $step = "+4 month";
            $this->specifier = "M";
        }
        
        elseif($months > 48 && $months <= 92) {
            $step = "+1 year";
            $this->specifier = "Y";
        }
        
        else {
            $step = "+5 year";
            $this->specifier = "Y";
        }
        
    	$dates = array();
    	$current = strtotime( $first );
    	$last = strtotime( $last );
    
    	while( $current <= $last ) {
    
    		$start = date( $format, $current );
    		
    		$current = strtotime( $step, $current );
    		
    		$end = date( $format, $current );
    		
    		$dates[] = ["start" => $start, "end" => $end];
    		
    	}
    	return $dates;
    }
    
}
