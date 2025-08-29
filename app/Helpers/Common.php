<?php

use App\Models\BannerModel;
use App\Models\Cart;
use App\Models\Category;
use App\Models\PastEventModel;
use App\Models\Product;
use App\Models\Section;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

function getCommonSetting(){
    $commonSetting = \App\Models\CommonSetting::first();
    return $commonSetting;
}
function getProducts(){
    $data = \App\Models\Product::where('status','1')->get();
//    print_r($data);die;
    return $data;
}

function past_events(){
    $past_events = PastEventModel::get();
    return $past_events;
}

function get_footer_banner(){
    $get_footer_banner =   BannerModel::where([
        'display_area' => '4',
        'status' => '1',
    ])->orderBy('id', 'DESC')->first();

//    print_r($get_footer_banner);die;
    return $get_footer_banner;

}

function get_hero_banner(){
    $data = \App\Models\BannerModel::where('display_area','1')->where('status','1')->get();
    return $data;
}


function sendOrderRequest($orderData) {
    $url = 'https://shipping-api.com/app/api/v1/push-order';
    $privateKey = 'wN5XhnmHM72iDf8PEt6Z';
    $publicKey = 'xCfJuiWSGAksYUPl6eB8';

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($orderData),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            "private-key: $privateKey",
            "public-key: $publicKey"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
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


function get_courses(){
    $course = \App\Models\Courses::where([
        'status' => '1',
    ])->get();

    return $course;
}
function get_testimonials(){
    $course = \App\Models\Testimonial::where([
        'status' => '1',
    ])->get();

    return $course;
}



?>
