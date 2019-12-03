<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Appointment;

class DashboardController extends Controller
{
    /**
     * Dashboard INDEX
     */
    public function index()
    {
        return view('patients.dashboard');
    }

    /**
     * Appointments INDEX
     */
    public function appointments()
    {
        $appointments = Appointment::where('patient_id', Auth::guard('patient')->user()->id)->orderBy('appointment_date')->get();

        return view('patients.appointments.index', [
            'appointments' => $appointments,
        ]);
    }
}
