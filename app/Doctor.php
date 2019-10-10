<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * The specialties that belong to the doctor.
     */
    public function specialties()
    {
        return $this->belongsToMany('App\Specialty');
    }
}
