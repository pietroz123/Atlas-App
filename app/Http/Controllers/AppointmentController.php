<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
use App\Appointment;
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
     * Cancel an appointment
     */
    public function cancel($id)
    {
        // Get Appointment
        $appointment = Appointment::find($id);
        $appointment->delete();

        return redirect()->route('patients.dashboard.appointments.index')->with('success', 'Agendamento cancelado com sucesso');
    }

    /**
     * Edit an appointment
     */
    public function edit($id)
    {
        $ap = Appointment::find($id);
        $ap_date = $ap->appointment_date;

        $doctor = Doctor::find($ap->doctor_id);

        // Get doctor available times
        $available_times = $doctor->available_times($ap_date);

        return view('patients.appointments.edit', [
            'ap' => $ap,
            'available_times' => $available_times,
        ]);
    }

    /**
     * Update an appointment
     */
    public function update($id)
    {
        $ap = Appointment::find($id);
        $ap->appointment_date = request('ap-date');
        $ap->probable_start_time = request('ap-time');
        // $ap-> = request('ap-add-info');

        $ap->save();
        
        return redirect()->route('patients.dashboard.appointments.index')->with('success', 'Agendamento atualizado com sucesso'); 
    } 
}
