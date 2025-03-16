<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Users;

class Property extends Model
{
    protected $fillable = [
        
        'name', 
        'description', 
        'price_per_night',
    ];
}
