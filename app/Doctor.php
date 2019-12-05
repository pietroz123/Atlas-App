<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use DateTime;

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
        'clinic_id',
        'crm',
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
    public function specialties() {
        return $this->belongsToMany('App\Specialty');
    }
    public function clinic() {
        return $this->belongsTo('App\Clinic');
    }
    public function availabilities() {
        return $this->hasMany('App\DoctorAvailability');
    }
    public function patientRatings() {
        return $this->hasMany('App\PatientRating');
    }

    /**
     * Return doctor avg rating
     */
    public function avgRating()
    {
        /**
         * Ratings
         */
        $ratings = $this->patientRatings;
        $countRatings = count($ratings);
        if ($countRatings > 0) {
            $sum = 0;
            foreach ($ratings as $rating) {
                $sum += (int) $rating->rating;
            }
            $avgRating = ceil($sum / $countRatings);
        }
        else
            $avgRating = 0;

        return $avgRating;
    }

    /**
     * Return doctor available times
     */
    public function available_times($ap_date)
    {
        $appointmentsOnDate = Appointment::where('doctor_id', $this->id)->where('appointment_date', $ap_date)->get();

        $morning = $this->availabilities->where('period', 'morning')->first();
        $afternoon = $this->availabilities->where('period', 'afternoon')->first();

        /**
         * Calculates morning time seconds
         */
        $dateTimeMorningStart = DateTime::createFromFormat('H:i:s', $morning->start_time);
        $secondsMorningStart =
            $dateTimeMorningStart->format('H') * 60 * 60 +
            $dateTimeMorningStart->format('i')      * 60 +
            $dateTimeMorningStart->format('s');

        $dateTimeMorningEnd = DateTime::createFromFormat('H:i:s', $morning->end_time);
        $secondsMorningEnd =
            $dateTimeMorningEnd->format('H') * 60 * 60 +
            $dateTimeMorningEnd->format('i')      * 60 +
            $dateTimeMorningEnd->format('s');

        /**
         * Calculates afternoon time seconds
         */
        $dateTimeAfternoonStart = DateTime::createFromFormat('H:i:s', $afternoon->start_time);
        $secondsAfternoonStart =
            $dateTimeAfternoonStart->format('H') * 60 * 60 +
            $dateTimeAfternoonStart->format('i')      * 60 +
            $dateTimeAfternoonStart->format('s');

        $dateTimeAfternoonEnd = DateTime::createFromFormat('H:i:s', $afternoon->end_time);
        $secondsAfternoonEnd =
            $dateTimeAfternoonEnd->format('H') * 60 * 60 +
            $dateTimeAfternoonEnd->format('i')      * 60 +
            $dateTimeAfternoonEnd->format('s');

        /**
         * Cria um vetor de horas (https://surniaulula.com/2016/lang/php/php-create-an-array-of-hours/)
         */
        function get_hours_range( $start = 0, $end = 86400, $step = 3600, $format = 'g:i a', $boolean = true ) {
            $times = array();
            foreach ( range( $start, $end, $step ) as $timestamp ) {
                $hour_mins = gmdate( 'H:i', $timestamp );
                $times[$hour_mins] = $boolean;
            }
            return $times;
        }

        $morningTimes = get_hours_range($secondsMorningStart, $secondsMorningEnd, 900, 'g:i a', true);
        $afternoonTimes = get_hours_range($secondsAfternoonStart, $secondsAfternoonEnd, 900, 'g:i a', true);

        // Merge the two array of times
        $availableTimes = array_merge($morningTimes, $afternoonTimes);

        /**
         * Mark all the doctor appointments times as unavailable (false)  
         */
        foreach ($appointmentsOnDate as $ap) {
            $time = date('H:i', strtotime($ap->probable_start_time));
            if ($ap->patient_id != Auth::guard('patient')->user()->id) {
                $availableTimes[$time] = false;
            }
        }

        return $availableTimes;
    }
}
