<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OtpService
{
    protected $gupshup_api_url;
    protected $api_key;
    protected $sender_id;

    public function __construct()
    {
        $this->gupshup_api_url = env('GUPSHUP_API_URL', 'https://api.gupshup.io/sms/send');
        $this->api_key = env('GUPSHUP_API_KEY');
        $this->sender_id = env('GUPSHUP_SENDER_ID', 'OTPService');
    }

    public function sendOtp($phone_number, $otp)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'apikey' => $this->api_key,
        ])->post($this->gupshup_api_url, [
            'message' => "Your OTP is $otp. Please do not share it.",
            'send_to' => $phone_number,
            'msg_type' => 'TEXT',
            'sender' => $this->sender_id,
        ]);

        return $response->json();
    }
}
