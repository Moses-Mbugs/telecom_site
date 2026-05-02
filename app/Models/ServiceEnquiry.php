<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceEnquiry extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'service_interest', 'message'];
}
