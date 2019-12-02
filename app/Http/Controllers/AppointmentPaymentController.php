<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class AppointmentPaymentController extends Controller
{
    public function appointmentsPayment()
    {
        /**
         * Get Request data
         */
        $ap_date = request('ap-date');
        $ap_time = request('ap-time');
        $ap_add_info = request('ap-add-info');
        $doctor = Doctor::find(request('ap-doctor-id'));

        /**
         * Return payment page
         */
        return view('payments.appointments.payment-page', [
            'ap_date' => $ap_date,
            'ap_time' => $ap_time,
            'ap_add_info' => $ap_add_info,
            'doctor' => $doctor,
        ]);
    }
}
