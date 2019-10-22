<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Returns main HOME page
     */
    public function index()
    {
        if (Auth::guard('doctor')->check() OR Auth::guard('patient')->check()) {
            return redirect('dashboard');
        }
        else
            return view('home.home');
    }

    /**
     * Returns patients HOME page
     */
    public function pacientes()
    {
        if (Auth::guard('doctor')->check() OR Auth::guard('patient')->check()) {
            return redirect('dashboard');
        }
        else
            return view('home.pacientes');
    }

    /**
     * Returns doctors HOME page
     */
    public function medicos()
    {
        if (Auth::guard('doctor')->check() OR Auth::guard('patient')->check()) {
            return redirect('dashboard');
        }
        else
            return view('home.medicos');
    }
}
