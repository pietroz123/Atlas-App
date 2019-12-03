<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\PatientRating;

class RatingController extends Controller
{
    /**
     * Show all ratings
     */
    public function index()
    {
        return view('patients.appointments.ratings');
    }

    /**
     * Create an appointment rating
     */
    public function addRating()
    {
        /**
         * Get data from request
         */
        $ap_id = request('ap-id');
        $rating = request('rating');

        /**
         * Get appointment information
         */
        $ap = Appointment::find($ap_id);
        $patient_id = $ap->patient_id;
        $doctor_id = $ap->doctor_id;

        /**
         * Create rating
         */
        PatientRating::create([
            'patient_id' => $patient_id,
            'doctor_id' => $doctor_id,
            'rating' => $rating,
        ]);

        return redirect()->route('patients.dashboard.ratings.index')->with('success', 'Avaliação registrada com sucesso');

    }

}
