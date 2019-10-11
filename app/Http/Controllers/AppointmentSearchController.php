<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Doctor;

class AppointmentSearchController extends Controller
{
    /**
     * Main page for appointments search
     */
    public function search()
    {
        // Retrieve all doctor specialties
        $specialties = Specialty::all();

        return view('appointments.search', [
            'specialties' => $specialties
        ]);
    }

    /**
     * Page for the search results
     */
    public function results()
    {
        /**
         * Retrive data from request
         */
        $specialty = request('specialty');

        /**
         * Filter doctors with given specialty
         */
        if ($specialty != -1) {

            $doctors = Doctor::whereHas('specialties', function($s) use ($specialty) {
                $s->where('id', $specialty);
            })->paginate(10);

            // Append doctors on request
            $doctors->appends(request()->query());
        }
        else {
            // Retrieve all doctors
            $doctors = Doctor::paginate(10);
        }


        return view('appointments.search-result', [
            'doctors' => $doctors
        ]);   
    }

}
