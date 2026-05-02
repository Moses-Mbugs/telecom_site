<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MpesaEnquiry extends Model
{
    protected $fillable = ['name', 'email', 'position', 'workplace', 'enquiry'];
}
