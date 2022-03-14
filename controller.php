<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;
  
class TwilioSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $receiverNumber = "RECEIVER_NUMBER";
        $message = "This is testing from Ameer Hamza";
  
        try {
  
            $account_sid = getenv("TWILIO_SID");    
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            dd('SMS Sent Successfully.');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}




//this is package istall in your project
// composer require twilio/sdk 



 // .env config
 // add this in your env file 
 // TWILIO_SID=XXXXXXXXXXXXXXXXX  //here your TWILIO_SID from twilio
 // TWILIO_TOKEN=XXXXXXXXXXXXX    //here your TWILIO_TOKEN from twilio
 // TWILIO_FROM=+XXXXXXXXXXX      //here your TWILIO PHONE NUMBER from twilio


