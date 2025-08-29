<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonSetting extends Model
{
    protected $fillable = [
        'logo_header', 'logo_footer', 'mobile_logo', 'favicon',
        'site_title', 'site_desc', 'copyright_content', 'address',
        'mobile_number', 'email_id', 'facebook', 'insta', 'twitter',
        'linkedin', 'privacy_policy', 'terms_and_conditions',
        'refund_policy', 'shipping_policy'
    ];
}