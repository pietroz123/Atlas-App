<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use App\Doctor;

class AppointmentPaymentController extends Controller
{
    public function appointmentsPayment()
    {
        /**
         * Get Request data
         */
        $ap_date = request('ap-date');
        $ap_time = request('ap-time');
        $ap_add_info = request('ap-add-info');
        $doctor = Doctor::find(request('ap-doctor-id'));

        /**
         * Get PagSeguro SESSION ID
         */
        $client = new Client([
            'base_uri' => 'https://ws.sandbox.pagseguro.uol.com.br/v2/',
            'timeout'  => 2.0, 
        ]);
    
        $response = $client->request('POST', '/sessions', [
            'form_params' => [
                'email' => env('PAGSEGURO_EMAIL'),
                'token' => env('PAGSEGURO_TOKEN_SANDBOX'),
            ]
        ]);
        $xml = simplexml_load_string( $response->getBody()->getContents() );
        $json = json_decode( json_encode($xml) );
        $session_id = $json->id;

        /**
         * Return payment page
         */
        return view('payments.appointments.payment-page', [
            'ap_date' => $ap_date,
            'ap_time' => $ap_time,
            'ap_add_info' => $ap_add_info,
            'doctor' => $doctor,
            'session_id' => $session_id,
        ]);
    }
}
