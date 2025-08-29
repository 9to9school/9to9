<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\OtpService;
use App\Models\User;
use App\Models\Otp;
use App\Models\Token;
use App\Models\PreRegisterationCallback;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use Laravel\Sanctum\HasApiToken;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{

    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    function sendSMS($username, $password, $senderId, $sendTo, $message, $templateId, $PEID = '') {
        $apiUrl = "http://45.249.108.134/api.php";

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'username' => $username,
            'password' => $password,
            'sender' => $senderId,
            'sendto' => $sendTo,
            'message' => $message,
            'PEID' => '',
            'templateid' => $templateId,
        ]);

        $response = curl_exec($ch);
        
        curl_close($ch);

        return $response;
    }


    public function sendOtp(Request $request)
    {
        // ✅ Step 1: Validate input
        $request->validate([
            'phone_number' => 'required|digits:10',
        ]);

        $phoneNumber = $request->input('phone_number');

        if($phoneNumber == '9999999999'){
            $otp = '1234';
        }else{
          // ✅ Step 3: Generate 4-digit OTP
           $otp = rand(1000, 9999);
        }

        // ✅ Step 2: Ensure pre-registration user exists
        PreRegisterationCallback::firstOrCreate(
            ['phone_number' => $phoneNumber],
            ['name' => 'Guest']
        );

       

        // ✅ Step 4: Save or update OTP
        Otp::updateOrCreate(
            ['phone_number' => $phoneNumber],
            [
                'otp'         => $otp,
                'expires_at'  => now()->addMinutes(5),
                'status'      => 0,
            ]
        );

        // ✅ Step 5: Compose SMS message
        $message = "Dear {$otp} Your OTP for Logging in to Grooves account is {#var#} Valid for 5 min - Grooveslifestyle";

        // ✅ Step 6: SMS API credentials
        $smsUsername = 'grooves';
        $smsPassword = '887200';
        $senderId    = 'Groovv';
        $templateId  = '1707170454023448070';

        // ✅ Step 7: Send SMS
        $smsResponse = $this->sendSMS($smsUsername, $smsPassword, $senderId, $phoneNumber, $message, $templateId);

        // ✅ Step 8: Return response
        return response()->json([
            'status'   => true,
            'message'  => 'OTP sent successfully',
            'otp'      => $otp,               // Remove in production for security
            'response' => $smsResponse,
        ]);
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|digits:10',
            'otp' => 'required|digits:4',
        ]);

        $otpRecord = Otp::where('phone_number', $request->phone_number)
            ->where('otp', $request->otp)
            ->where('status', 0)
            // ->where('expires_at', '>=', now()) // Optional: check expiry
            ->first();

        if (!$otpRecord) {
            return response()->json(['status' => false, 'message' => 'Invalid or expired OTP'], 400);
        }

        $otpRecord->status = 1;
        $otpRecord->save();

        $otpRecord->status = 1;
        $otpRecord->save();

        // Create or fetch pre-registration record
        $user = PreRegisterationCallback::firstOrCreate(
            ['phone_number' => $request->phone_number],
            ['name' => 'Guest User']
        );

        // Generate a dummy access token (optional)
        $token = Str::random(60); // or use Sanctum if needed

        $data = [
            'token' => $token,
            'source' => 'otp',
        ];
        // You can use Eloquent
       Token::create($data); //

        return response()->json([
            'status' => true,
            'message' => 'OTP verified successfully',
            'user' => $user,
            'token' => $token,
        ]);
    }
    

}