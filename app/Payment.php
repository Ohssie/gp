<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    protected $fillable = [
    	'sub_key', 'payee_username', 'payer_username', 'status', 'amount'
    ];

    public function package()
    {
        $user = Auth::user();
        
        try { 
            
            $pid = \App\PackageSub::where('sub_key', $this->sub_key)->first();
    	    return \App\Package::find($pid->package_id); 
    	    
        } catch(\Exception $e) { 
            return redirect(url($user->isAdmin() ? 'admin/dashboard' : 'dashboard'))->with('dash_error', 'abcdefghij.');
         
        }
        
    	
    }
}
