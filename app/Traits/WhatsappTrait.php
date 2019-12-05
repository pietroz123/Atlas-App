<?php

namespace App\Traits;

use Twilio\Rest\Client;
use App\Appointment;
use App\Pacote;

trait WhatsappTrait
{
    /**
     * Envia um whatsapp com notificação de agendamento
     */
    public function sendAppointmentWhatsapp(Appointment $ap)
    {
        $sid    = env('TWILIO_SID'); 
        $token  = env('TWILIO_TOKEN'); 
        $twilio = new Client($sid, $token); 

        /**
         * Mensagem
         */
        $mensagem = "Atlas Saúde\n\n";
        $mensagem .= "*Novo agendamento realizado* com *". $ap->doctor->full_name . "*";
        $mensagem .= "\n\n*Horário*:\n";
        $mensagem .= date('Y-m-d H:i:s', strtotime("$ap->appointment_date $ap->probable_start_time"));

        /**
         * Envia o Whatsapp
         */
        $message = $twilio->messages 
                        ->create("whatsapp:+55 (15) 99713-6093", // to 
                                array( 
                                    "from" => "whatsapp:+14155238886",       
                                    "body" => $mensagem,
                                ) 
                        ); 
        
    }

}