<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    	'sub_key', 'payee_username', 'payer_username', 'status', 'amount'
    ];

    public function package()
    {
    	$pid = \App\PackageSub::where('sub_key', $this->sub_key)->first();
    	return \App\Package::find($pid->package_id);
    }
}
