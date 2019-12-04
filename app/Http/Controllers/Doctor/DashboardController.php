<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Dashboard INDEX
     */
    public function index()
    {
        return view('doctors.dashboard-doctor-index');
    }
}
