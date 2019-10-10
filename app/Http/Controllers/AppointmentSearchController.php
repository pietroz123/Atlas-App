<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;

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
}
