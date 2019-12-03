<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'rating',
    ];

    // Relationships
    public function patient() {
        return $this->belongsTo('App\Patient');
    }
    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }
}
