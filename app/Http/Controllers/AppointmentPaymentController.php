<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use App\Doctor;

class AppointmentPaymentController extends Controller
{
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

        /**
         * 
         */
        // $client = new Client([
        //     'base_uri' => 'https://ws.sandbox.pagseguro.uol.com.br/v2/',
        //     // 'timeout'  => 2.0, 
        // ]);
    
        // $response = $client->request('POST', '/transactions', [
        //     'form_params' => [
        //         'email' => env('PAGSEGURO_EMAIL'),
        //         'token' => env('PAGSEGURO_TOKEN_SANDBOX'),

        //         'paymentMode' => 'default',
        //         'paymentMethod' => 'creditCard',
        //         'receiverEmail' => env('PAGSEGURO_EMAIL'),
        //         'currency' => 'BRL',

        //         // 'extraAmount' => '1.00',

        //         'itemId1' => '1',
        //         'itemDescription1' => 'Notebook Prata',
        //         'itemAmount1' => '60.00',
        //         'itemQuantity1' => '1',
        //         'notificationURL' => 'https://sualoja.com.br/notificacao',
        //         'reference' => 'REF1234',

        //         // Info Remetente
        //         'senderName' => 'José Comprador',
        //         'senderCPF' => '22111944785',
        //         'senderAreaCode' => '11',
        //         'senderPhone' => '56273440',
        //         'senderEmail' => 'c42739828696487174320@sandbox.pagseguro.com.br',

        //         // Chaves
        //         'senderHash' => $sender_hash,
        //         'creditCardToken' => $card_token,

        //         // Info de Envio
        //         // 'shippingAddressRequired' => 'true',
        //         'shippingAddressStreet' => 'Av. Brig. Faria Lima',
        //         'shippingAddressNumber' => '1384',
        //         'shippingAddressComplement' => '5o andar',
        //         'shippingAddressDistrict' => 'Jardim Paulistano',
        //         'shippingAddressPostalCode' => '01452002',
        //         'shippingAddressCity' => 'Sao Paulo',
        //         'shippingAddressState' => 'SP',
        //         'shippingAddressCountry' => 'BRA',
        //         'shippingType' => '1',
        //         'shippingCost' => '0.00',
                
        //         // Info Parcelas
        //         'installmentQuantity' => $installment_qty,
        //         'noInterestInstallmentQuantity' => 4,
        //         'installmentValue' => $installment_value,

        //         // Info Pagamento
        //         'creditCardHolderName' => 'Jose Comprador',
        //         'creditCardHolderCPF' => '22111944785',
        //         'creditCardHolderBirthDate' => '27/10/1987',
        //         'creditCardHolderAreaCode' => '11',
        //         'creditCardHolderPhone' => '56273440',
        //         'billingAddressStreet' => 'Av. Brig. Faria Lima',
        //         'billingAddressNumber' => '1384',
        //         'billingAddressComplement' => '5o andar',
        //         'billingAddressDistrict' => 'Jardim Paulistano',
        //         'billingAddressPostalCode' => '01452002',
        //         'billingAddressCity' => 'Sao Paulo',
        //         'billingAddressState' => 'SP',
        //         'billingAddressCountry' => 'BRA',
        //     ]
        // ]);

        // $xml = simplexml_load_string( $response->getBody()->getContents() );
        // $json = json_decode( json_encode($xml) );
        // dd($json);


        $data['email'] = env('PAGSEGURO_EMAIL');
        $data['token'] = env('PAGSEGURO_TOKEN_SANDBOX');

        $data['paymentMode'] = 'default';
        $data['paymentMethod'] = 'creditCard';
        $data['receiverEmail'] = env('PAGSEGURO_EMAIL');
        $data['currency'] = 'BRL';

        // $data[// 'extraAmount'] = '1.00';

        $data['itemId1'] = '1';
        $data['itemDescription1'] = 'Notebook Prata';
        $data['itemAmount1'] = '60.00';
        $data['itemQuantity1'] = '1';
        $data['notificationURL'] = 'https://sualoja.com.br/notificacao';
        $data['reference'] = 'REF1234';

        // Info Remetente
        $data['senderName'] = 'José Comprador';
        $data['senderCPF'] = '22111944785';
        $data['senderAreaCode'] = '11';
        $data['senderPhone'] = '56273440';
        $data['senderEmail'] = 'c42739828696487174320@sandbox.pagseguro.com.br';

        // Chaves
        $data['senderHash'] = $sender_hash;
        $data['creditCardToken'] = $card_token;

        // Info de Envio
        // $data[// 'shippingAddressRequired'] = 'true';
        $data['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
        $data['shippingAddressNumber'] = '1384';
        $data['shippingAddressComplement'] = '5o andar';
        $data['shippingAddressDistrict'] = 'Jardim Paulistano';
        $data['shippingAddressPostalCode'] = '01452002';
        $data['shippingAddressCity'] = 'Sao Paulo';
        $data['shippingAddressState'] = 'SP';
        $data['shippingAddressCountry'] = 'BRA';
        $data['shippingType'] = '1';
        $data['shippingCost'] = '0.00';
        
        // Info Parcelas
        $data['installmentQuantity'] = $installment_qty;
        $data['noInterestInstallmentQuantity'] = 4;
        $data['installmentValue'] = $installment_value;

        // Info Pagamento
        $data['creditCardHolderName'] = 'Jose Comprador';
        $data['creditCardHolderCPF'] = '22111944785';
        $data['creditCardHolderBirthDate'] = '27/10/1987';
        $data['creditCardHolderAreaCode'] = '11';
        $data['creditCardHolderPhone'] = '56273440';
        $data['billingAddressStreet'] = 'Av. Brig. Faria Lima';
        $data['billingAddressNumber'] = '1384';
        $data['billingAddressComplement'] = '5o andar';
        $data['billingAddressDistrict'] = 'Jardim Paulistano';
        $data['billingAddressPostalCode'] = '01452002';
        $data['billingAddressCity'] = 'Sao Paulo';
        $data['billingAddressState'] = 'SP';
        $data['billingAddressCountry'] = 'BRA';


        $BuildQuery = http_build_query($data);
        $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $BuildQuery);
        $return = curl_exec($curl);
        curl_close($curl);

        $xml = simplexml_load_string($return);
        $json = json_decode( json_encode($xml) );
        dd($json);
    }
}
