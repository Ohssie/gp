<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageSub extends Model
{
    protected $table = 'package_subscription';
    protected $fillable = [
    	'package_id', 'username', 'upline_username', 'sub_key', 'status', 'up_sub_key'
    ];
    protected $primaryKey = 'sub_id';

    private function personDetails($username = null)
    {
    	return \App\User::where('username', $username)->first();
    }

    public function uplineUser($username = null)
    {
    	$username = (is_null($username)) ? $this->upline_username : $username;
    	return $this->personDetails($username);
    }

    public function downlineUser($username = null)
    {
    	$username = (is_null($username))?$this->username:$username;
    	return $this->personDetails($username);
    }
}
