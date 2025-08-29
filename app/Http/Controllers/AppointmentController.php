<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::latest()->get(); 
        return view('admin.appointment.index', compact('appointments'));
    }
    public function appointmnent()
    {
        return view('admin.contact-us.appoinment');
    }
    public function bookappointment(Request $request)
{
    $validated = $request->validate([
        'full_name' => 'required|string|max:255',
        'mobile_number' => 'required|string|max:20',
        'child_age_group' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'appointment_mode' => 'required|in:in_person,video_call',
        'preferred_date' => 'nullable|date',
        'preferred_time_slot' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
    ]);

    Appointment::create([
        'full_name' => $request->full_name,
        'mobile_number' => $request->mobile_number,
        'child_age_group' => $request->child_age_group,
        'state' => $request->state,
        'city' => $request->city,
        'appointment_mode' => $request->appointment_mode,
        'preferred_date' => $request->preferred_date,
        'preferred_time_slot' => $request->preferred_time_slot,
        'notes' => $request->notes,
    ]);
    return redirect()->back()->with('success', 'Appointment booked successfully!');
}
}
