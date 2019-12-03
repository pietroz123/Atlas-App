<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        dd(request());
    }

}
