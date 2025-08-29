<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs=Faq::select('id', 'name', 'description', 'category_id')->where('status', 'active')->get();
        return response()->json([
            'status' => true,
            'data' => $faqs
        ]);
        
    }

}