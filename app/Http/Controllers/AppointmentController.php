<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\WhatsappTrait;
use App\Doctor;
use App\Appointment;
use App\City;

class AppointmentController extends Controller
{
    use WhatsappTrait;

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
        /**
         * Get data from the request
         */
        $patient_id = Auth::guard('patient')->user()->id;
        $doctor_id = request('ap-doctor-id');
        $start_time = request('ap-time');
        $status = 'active';
        $date = request('ap-date');

        /**
         * Create Appointment
         */
        $ap = Appointment::create([
            'patient_id' => $patient_id,
            'doctor_id' => $doctor_id,
            'probable_start_time' => $start_time,
            'status' => $status,
            'appointment_date' => $date,
        ]);
        
        /**
         * Send Whatsapp
         */
        $this->sendAppointmentWhatsapp($ap);

        // Return to dashboard
        return redirect()->route('patients.dashboard.appointments.index')->with('success', 'Agendamento realizado com sucesso');
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
