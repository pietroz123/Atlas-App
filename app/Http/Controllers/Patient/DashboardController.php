<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('patients.dashboard');
    }

    public function appointments()
    {
        $appointments = Appointment::where('patient_id', Auth::guard('patient')->user()->id)->get();

        return view('patients.appointments.index', [
            'appointments' => $appointments,
        ]);
    }
}
