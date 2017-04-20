<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'phone', 'password', 'role', 'bank_name', 'account_number', 'account_name', 'email', 'phone2', 'gender', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'status',
    ];

    public function isAdmin()
    {
        if($this->role == "admin")
            return true;
        return false;
    }
    
    public function isAllowed()
    {
        if($this->role == "allowed")
            return true;
        return false;
    }
}
