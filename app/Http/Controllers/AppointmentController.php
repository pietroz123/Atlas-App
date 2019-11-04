<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\City;

class AppointmentController extends Controller
{
    /**
     * Return Book an appointment page
     */
    public function bookAppointmentPage($doctor_id, $ap_date, $ap_time)
    {
        $doctor = Doctor::find($doctor_id);
        $clinic = $doctor->clinic;
        $city = City::find($clinic->co_city);

        return view('appointments.book-appointment')->with(compact(
            'doctor',
            'clinic',
            'city',
            'ap_date',
            'ap_time',
        ));
    }

    /**
     * Book an appointment
     */
    public function bookAppointment()
    {
        // TODO
    }
}
