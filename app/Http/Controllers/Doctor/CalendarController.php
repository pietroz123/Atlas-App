<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
use App\Appointment;

class CalendarController extends Controller
{
    /**
     * Calendar index
     */
    public function showCalendar()
    {
        return view('doctors.dashboard-doctor-calendar');
    }

    /**
     * Get Doctor Appointments
     */
    public function getAppointments()
    {
        $doctor_id = Auth::guard('doctor')->user()->id;
        
        $appointments = Appointment::where('doctor_id', $doctor_id)->get();
        $aps = array();
        
        foreach ($appointments as $ap) {
            // Appointment start (date + time)
            $start = date('Y-m-d H:i:s', strtotime("$ap->appointment_date $ap->probable_start_time"));
            // Push to array
            array_push($aps, [
                'title' => '['. $ap->patient->full_name .']',
                'start' => $start,
                'end' => date('Y-m-d H:i:s', strtotime("+15 minutes", strtotime($start)) ),
                'backgroundColor' => '#cc0000',
            ]);
        }

        return json_encode($aps);
    }
}
