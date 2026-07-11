<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    //
    // Allows all fields to be mass-assigned
    protected $guarded = []; 
    
    // Optional: Cast dark_mode to a proper boolean automatically
    protected $casts = [
        'dark_mode' => 'boolean',
    ];
}
