<?php

namespace App\Http\Controllers\Doctor;

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
        $today = date('Y-m-d');
        $nextWeek = date('Y-m-d', strtotime("+1 week", strtotime($today)) );

        $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->user()->id)->whereBetween('appointment_date', [$today, $nextWeek])->get();
        $count_appointments = $appointments->count();

        return view('doctors.dashboard-doctor-index', [
            'count_appointments' => $count_appointments,
        ]);
    }
}
