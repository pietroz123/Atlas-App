<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAvailability extends Model
{
    protected $guarded = [];
    
    // Disable timestamps
    public $timestamps = false;
}
