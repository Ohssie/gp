<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentUpload extends Model
{
    protected $table = 'payment_uploads';
    protected $fillable = ['upload_url', 'filename', 'reference'];
    protected $primaryKey = 'upload_id';
}
