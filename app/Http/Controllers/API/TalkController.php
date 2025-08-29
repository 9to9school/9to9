<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Talk;
class TalkController extends Controller
{
    public function index()
    {
        
        // Get only the 'mobile' column
        $mobile = Talk::whereNotNull('mobile_number')
            ->where('mobile_number', '!=', '')
            ->latest()
            ->first(['mobile_number']);

        return response()->json([
            'status' => true,
            'data' => [
                'calling_number' => $mobile?->mobile_number,
                'whatsapp_number' => $mobile?->mobile_number,
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'calling_number' => 'required|string|max:15',
            'whatsapp_number' => 'required|string|max:15',
        ]);

            $talk = Talk::findOrFail($id);
            $talk->calling_number = $request->calling_number;
            $talk->whatsapp_number = $request->whatsapp_number;
            $talk->save();

        if ($talk->save()) {
            return response()->json(['status' => true, 'message' => 'Updated successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to update.']);
        }

    }
}
