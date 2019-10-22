<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:doctor')->except('logout');
        $this->middleware('guest:patient')->except('logout');
    }

    // =======================================================
    // DOCTOR
    // =======================================================

    /**
     * Show doctor login form
     */
    public function showDoctorLoginForm()
    {
        return view('auth.login', ['url' => 'doctor']);
    }

    /**
     * Login Doctor
     */
    public function doctorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/dashboard/medico');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    // =======================================================
    // PATIENT
    // =======================================================

    /**
     * Show patient login form
     */
    public function showPatientLoginForm()
    {
        return view('auth.login', ['url' => 'patient']);
    }

    /**
     * Login Patient
     */
    public function patientLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/dashboard/paciente');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

}
