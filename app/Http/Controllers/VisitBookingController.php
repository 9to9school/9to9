<?php
// app/Http/Controllers/VisitBookingController.php

namespace App\Http\Controllers;

use App\Models\VisitBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VisitBookingController extends Controller
{
    // List all visit bookings
    public function AllVisitBookings()
    {
        $title = "Visit Booking Management";
        $visitBookings = VisitBooking::latest()->get();
        return view('admin.visit_booking.index', compact('visitBookings', 'title'));
    }

    // Add or update visit booking
    public function AddVisitBooking(Request $request, $id = null)
    {
        if ($id == null) {
            $title = "Add Visit Booking";
            $visitBooking = new VisitBooking();
            $message = "Visit Booking added successfully";
        } else {
            $title = "Update Visit Booking";
            $visitBooking = VisitBooking::findOrFail($id);
            $message = "Visit Booking updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title'         => 'required|string|max:255|unique:visit_bookings,title,' . $id,
                'description'   => 'nullable|string',
                'btn_name'      => 'nullable|string|max:255',
                'btn_link'      => 'nullable|string|max:255',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Store or update the visit booking
            if ($id == null) {
                VisitBooking::create($data);
            } else {
                $visitBooking->update($data);
            }

            return redirect()->back()->with('success', $message);
        }
        return view('admin.visit_booking.create', compact('title', 'visitBooking'));
    }

    // Delete visit booking (optional)
    public function DeleteVisitBooking($id)
    {
        $visitBooking = VisitBooking::findOrFail($id);
        $visitBooking->delete();
        return redirect()->route('admin.visit_bookings')->with('success', 'Visit Booking deleted successfully');
    }
}
