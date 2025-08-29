<?php

namespace App\Http\Controllers\Api;
use App\Models\PartnerSchoolReview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerSchoolReviewController extends Controller
{
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/partner_school/review/', $filename);
            $image = 'assets/images/partner_school/review/' . $filename;
        }

        $review = PartnerSchoolReview::create([
            'partner_school_id' => $request->partner_school_id,
            'user_id' => $request->user_id,
            'name' => $request->name,
            'image' => $image ?? null,
            'rating' => $validated['rating'],
            'review' => $validated['review'] ?? null
        ]);

        return response()->json([
            'message' => 'Review submitted successfully.',
            'review' => $review
        ], 201);
    }


    public function index($id)
    {
        $review = PartnerSchoolReview::find($id);

        if (!$review) {
            return response()->json([
                'message' => 'Review not found.',
                'review' => null
            ], 404);
        }

        return response()->json([
            'message' => 'Review fetched successfully.',
            'review' => $review
        ]);
    }

}
