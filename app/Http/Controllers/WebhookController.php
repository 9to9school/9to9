<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log or validate Cashfree signature if needed
        \Log::info('Cashfree webhook received:', $request->all());

        // Update payment status in DB here...
        return response()->json(['message' => 'Webhook received'], 200);
    }
}
