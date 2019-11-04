<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'doctor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'professional_statement',
        'practicing_from',
        'password',
        'address',
        'phone_number',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function specialties()
    {
        return $this->belongsToMany('App\Specialty');
    }

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }

    public function availabilities()
    {
        return $this->hasMany('App\DoctorAvailability');
    }

    public function morningAvailability($doctor_id)
    {
        return DoctorAvailability::where('doctor_id', $doctor_id)->where('period', 'morning')->get()->first();
    }

    public function afternoonAvailability($doctor_id)
    {
        return DoctorAvailability::where('doctor_id', $doctor_id)->where('period', 'afternoon')->get()->first();
    }
}
