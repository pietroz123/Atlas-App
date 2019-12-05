<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Doctor;
use App\Patient;
use App\Specialty;
use App\Clinic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:doctor');
        $this->middleware('guest:patient');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function validatorDoctor(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'professional_statement' => ['required', 'string', 'max:4096'],
            'practicing_from' => ['required', 'date'],
            'phone_number' => ['required', 'string', 'min:10', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function validatorPatient(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:40'],
            'phone_number' => ['required', 'string', 'min:10', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    // =======================================================
    // DOCTOR
    // =======================================================

    /**
     * Show Doctor registration form
     */
    public function showDoctorRegisterForm()
    {
        // Get available specialties
        $specialties = Specialty::all();

        // Get clinics
        $clinics = Clinic::all();

        return view('auth.register-doctor', [
            'specialties' => $specialties,
            'clinics' => $clinics,
        ]);
    }

    /**
     * Method to create a Doctor
     */
    protected function createDoctor(Request $request)
    {
        $this->validatorDoctor($request->all())->validate();
        $doctor = Doctor::create([
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'professional_statement' => $request['professional_statement'],
            'practicing_from' => $request['practicing_from'],
            'password' => $request['password'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/medico');
    }

    // =======================================================
    // PATIENT
    // =======================================================
    
    /**
     * Show Patient registration form
     */
    public function showPatientRegisterForm()
    {
        return view('auth.register-patient');
    }

    /**
     * Method to create a Patient
     */
    protected function createPatient(Request $request)
    {
        $this->validatorPatient($request->all())->validate();
        $patient = Patient::create([
            'full_name' => $request['full_name'],
            'phone' => $request['phone_number'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/paciente');
    }

}
