<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CommonSetting;

class CommonSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        CommonSetting::create([
            'logo_header' => 'uploads/logo_header.png',
            'logo_footer' => 'uploads/logo_footer.png',
            'mobile_logo' => 'uploads/mobile_logo.png',
            'favicon' => 'uploads/favicon.ico',
            'site_title' => 'Grooves Lifestyle',
            'site_desc' => 'Grooves Lifestyle is a premium brand for fashion and accessories.',
            'copyright_content' => '© 2025 Grooves Lifestyle. All rights reserved.',
            'address' => '123 Fashion Street, New York, NY, USA',
            'mobile_number' => '+1 234 567 890',
            'email_id' => 'support@grooveslifestyle.com',
            'facebook' => 'https://facebook.com/grooveslifestyle',
            'insta' => 'https://instagram.com/grooveslifestyle',
            'twitter' => 'https://twitter.com/grooveslifestyle',
            'linkedin' => 'https://linkedin.com/company/grooveslifestyle',
            'privacy_policy' => 'Our privacy policy ensures complete data protection.',
            'terms_and_conditions' => 'By using our site, you agree to our terms.',
            'refund_policy' => 'Refunds are available within 30 days of purchase.',
            'shipping_policy' => 'We offer free shipping worldwide on orders above $50.',
        ]);
    }
}