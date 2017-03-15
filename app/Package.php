<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "packages";
    protected $fillable = [
    	'package_name',
    	'depth',
    	'size',
    	'color',
    	'cost',
    	'description'
    ];
    protected $primaryKey = 'package_id';
}
