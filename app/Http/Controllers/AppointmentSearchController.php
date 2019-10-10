<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // Retrieve all doctors
        $doctors = DB::table('doctors')->paginate(10);

        return view('appointments.search-result', [
            'doctors' => $doctors
        ]);   
    }

}
