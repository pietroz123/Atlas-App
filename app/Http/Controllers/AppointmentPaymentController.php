<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\WhatsappTrait;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
use App\Appointment;

class AppointmentPaymentController extends Controller
{
    use WhatsappTrait;

    /**
     * Return Payment Page
     */
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
            // 'timeout'  => 2.0, 
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
         * Get logged in patient
         */
        $patient = Auth::guard('patient')->user();


        /**
         * Return payment page
         */
        return view('payments.appointments.payment-page', [
            'patient' => $patient,
            'ap_date' => $ap_date,
            'ap_time' => $ap_time,
            'ap_add_info' => $ap_add_info,
            'doctor' => $doctor,
            'session_id' => $session_id,
        ]);
    }

    /**
     * Checkout
     */
    public function checkout()
    {
        // Get Request data
        $card_token = request('card-token');
        $sender_hash = request('sender-hash');
        $installment_qty = request('installment-qty');
        $installment_value = request('installment-value');
        $ap_doctor_id = request('ap-doctor-id');
        $ap_date = request('ap-date');
        $ap_time = request('ap-time');

        /**
         * Create POST request to /transactions
         */
        $client = new Client();
    
        $response = $client->post('https://ws.sandbox.pagseguro.uol.com.br/v2/transactions', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
            ],
            'query' => [
                'email' => env('PAGSEGURO_EMAIL'),
                'token' => env('PAGSEGURO_TOKEN_SANDBOX'),
            ],
            'form_params' => [
                'paymentMode' => 'default',
                'paymentMethod' => 'creditCard',
                'receiverEmail' => env('PAGSEGURO_EMAIL'),
                'currency' => 'BRL',

                // 'extraAmount' => '1.00',

                'itemId1' => '1',
                'itemDescription1' => 'Notebook Prata',
                'itemAmount1' => '60.00',
                'itemQuantity1' => '1',
                'notificationURL' => 'https://sualoja.com.br/notificacao',
                'reference' => 'REF1234',

                // Info Remetente
                'senderName' => 'José Comprador',
                'senderCPF' => '22111944785',
                'senderAreaCode' => '11',
                'senderPhone' => '56273440',
                'senderEmail' => 'c42739828696487174320@sandbox.pagseguro.com.br',

                // Chaves
                'senderHash' => $sender_hash,
                'creditCardToken' => $card_token,

                // Info de Envio
                // 'shippingAddressRequired' => 'true',
                'shippingAddressStreet' => 'Av. Brig. Faria Lima',
                'shippingAddressNumber' => '1384',
                'shippingAddressComplement' => '5o andar',
                'shippingAddressDistrict' => 'Jardim Paulistano',
                'shippingAddressPostalCode' => '01452002',
                'shippingAddressCity' => 'Sao Paulo',
                'shippingAddressState' => 'SP',
                'shippingAddressCountry' => 'BRA',
                'shippingType' => '1',
                'shippingCost' => '0.00',
                
                // Info Parcelas
                'installmentQuantity' => $installment_qty,
                'noInterestInstallmentQuantity' => 2,
                'installmentValue' => $installment_value,

                // Info Pagamento
                'creditCardHolderName' => 'Jose Comprador',
                'creditCardHolderCPF' => '22111944785',
                'creditCardHolderBirthDate' => '27/10/1987',
                'creditCardHolderAreaCode' => '11',
                'creditCardHolderPhone' => '56273440',
                'billingAddressStreet' => 'Av. Brig. Faria Lima',
                'billingAddressNumber' => '1384',
                'billingAddressComplement' => '5o andar',
                'billingAddressDistrict' => 'Jardim Paulistano',
                'billingAddressPostalCode' => '01452002',
                'billingAddressCity' => 'Sao Paulo',
                'billingAddressState' => 'SP',
                'billingAddressCountry' => 'BRA',
            ]
        ]);

        $xml = simplexml_load_string( $response->getBody()->getContents() );
        $json = json_decode( json_encode($xml) );

        // TODO
        // Salvar o pedido no banco
        
        /**
         * Get data from the request
         */
        $patient_id = Auth::guard('patient')->user()->id;
        $doctor_id = $ap_doctor_id;
        $start_time = $ap_time;
        $status = 'active';
        $date = $ap_date;

        /**
         * Create Appointment
         */
        $ap = Appointment::create([
            'patient_id' => $patient_id,
            'doctor_id' => $doctor_id,
            'probable_start_time' => $start_time,
            'status' => $status,
            'appointment_date' => $date,
        ]);

        /**
         * Send Whatsapp
         */
        $this->sendAppointmentWhatsapp($ap);

        // Return to dashboard
        return redirect()->route('patients.dashboard.appointments.index')->with(
            'success', 
            '
                <h4 class="alert-heading">Agendamento realizado com sucesso!</h4>
                <p>Enviamos um Whatsapp com as infomações para que você não se esqueça.</p>
                <hr>
                <p class="mb-0">Estamos processando o seu pagamento.</p>
            '
        );

    }
}
