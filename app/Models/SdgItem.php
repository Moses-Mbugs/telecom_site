<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SdgItem extends Model
{
    protected $fillable = ['sdg_number', 'title', 'description', 'company_contribution', 'image'];
}
