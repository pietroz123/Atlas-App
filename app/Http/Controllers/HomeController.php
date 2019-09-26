<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Returns main HOME page
     */
    public function index()
    {
        return view('home.home');
    }

    /**
     * Returns patients HOME page
     */
    public function pacientes()
    {
        return view('home.pacientes');
    }

    /**
     * Returns doctors HOME page
     */
    public function medicos()
    {
        return view('home.medicos');
    }
}
