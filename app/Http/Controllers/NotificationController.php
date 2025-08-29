<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\DB; // Don't forget to import DB facade
use Illuminate\Support\Facades\Validator; // Good practice for validation

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Exception\Messaging\MessagingException;
use Kreait\Firebase\Exception\FirebaseException;
class NotificationController extends Controller
{

    protected $messaging;

    // public function __construct()
    // {
    //     $factory = (new Factory)
    //         ->withServiceAccount(public_path('to9-a8a84-firebase-adminsdk-fbsvc-aff7b38b04.json'));

    //     $this->messaging = $factory->createMessaging();
    // }



function sendFCMNotification()
{
    try {
        $factory = (new Factory)->withServiceAccount(public_path('to9-a8a84-firebase-adminsdk-fbsvc-aff7b38b04.json'));
        $messaging = $factory->createMessaging();

        $message = CloudMessage::fromArray([
            'token' => 'cVgjblp0J8slq8R0IuoR5f:APA91bFy38QWtqqUAsz3tlJkd1L-TPVabPqyikdyb10G0NdIzYkCI81788uSAEeA5plGwaimep-Jn02BkAIz_oAe6L1kTsLyeqhKE7dCc-Z6frgXnn1odI0',
            'notification' => [
                'title' => 'Hello!',
                'body' => 'Hello Hetain, Anand is testing from local',
                'image' => 'https://cdn-icons-png.flaticon.com/512/147/147144.png' // ✅ Image URL here
            ],
        ]);

        $result = $messaging->send($message);

        return response()->json([
            'status' => 'success',
            'firebase_response' => $result,
        ]);
    } catch (MessagingException | FirebaseException $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ], 500);
    } catch (\Throwable $e) {
        return response()->json([
            'status' => 'unexpected_error',
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ], 500);
    }
}




    public function device_token(Request $request)
    {
        // 1. Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id', // Assuming 'users' table and 'id' column
            'device_token' => 'required|string|max:255|unique:device_tokens,device_token', // Ensure token is unique
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422); // Unprocessable Entity
        }

        try {
            // 2. Save the token to the database
            // Using DB facade's insert method
            $saved = DB::table('device_tokens')->insert([
                'user_id' => $request->user_id,
                'device_token' => $request->device_token,
                'created_at' => now(), // Add timestamps if your table has them
                'updated_at' => now(), // Add timestamps
            ]);

            if ($saved) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Device token saved successfully.',
                ], 201); // Created
            } else {
                // This might happen if there's an issue with the DB driver or connection
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to save device token.',
                ], 500); // Internal Server Error
            }

        } catch (\Exception $e) {
            // Catch any exceptions during the database operation
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving the device token.',
                'error_details' => $e->getMessage(), // For debugging, remove in production
            ], 500); // Internal Server Error
        }
    }



     // Show list
    public function index()
    {
        $notifications = NotificationModel::latest()->get();
        return view('admin.notifications.index', compact('notifications'));
    }

    // show Add form
    public function create()
    {
        return view('admin.notifications.create');
    }

    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // Max 4MB
            'sendto' => 'nullable|string|max:255',
            'reason' => 'nullable|string|max:255',
            'time_from' => 'nullable|date',
            'time_to' => 'nullable|date|after_or_equal:time_from', // time_to must be after or equal to time_from
            'recurring' => 'boolean|nullable', // Checkbox sends '1' or null, 'boolean' rule handles this
        ]);

        if ($validator->fails()) {
            // If validation fails, redirect back with input and errors
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // 2. Handle image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store the image in the 'public/notifications' directory
            // and get its path. The 'public' disk is configured in config/filesystems.php
            $imagePath = $request->file('image')->store('notifications', 'public');
        }

        try {
            // 3. Create a new Notification record
            $notification = NotificationModel::create([
                'title' => $request->title,
                'message' => $request->message,
                'image' => $imagePath, // Save the path to the database
                'sendto' => $request->sendto,
                'reason' => $request->reason,
                'time_from' => $request->time_from,
                'time_to' => $request->time_to,
                'recurring' => $request->has('recurring'), // Check if the checkbox was ticked
            ]);

            // 4. Redirect with a success message
            return redirect()->route('admin.notifications.list')->with('success', 'Notification created successfully!');

        } catch (\Exception $e) {
            // If an error occurs during database save, delete the uploaded image
            if ($imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to create notification: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = NotificationModel::findOrFail($id);
        return view('admin.notifications.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
public function update(Request $request)
{

    $id = $request->id;
    // Fetch the notification (404 if not found)
    $notification = NotificationModel::findOrFail($id);

    // Validate input
    $validator = Validator::make($request->all(), [
        'title'        => 'required|string|max:255',
        'message'      => 'required|string',
        'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'sendto'       => 'required|string|max:255',
        'reason'       => 'required|string|max:255',
        'time_from'    => 'required|date',
        'time_to'      => 'nullable|date|after_or_equal:time_from',
        'recurring'    => 'sometimes|boolean',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    $oldImagePath = $notification->image;
    $imagePath = $oldImagePath;

    // Handle image upload / replacement
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('notifications', 'public');
        if ($oldImagePath && $oldImagePath !== $imagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }
    } elseif ($request->filled('clear_image')) {
        // Optional: clear image if user indicated
        if ($oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }
        $imagePath = null;
    }

    // Prepare updated data
    $updateData = [
        'title'      => $request->title,
        'message'    => $request->message,
        'image'      => $imagePath,
        'sendto'     => $request->sendto,
        'reason'     => $request->reason,
        'time_from'  => $request->time_from,
        'time_to'    => $request->time_to,
        'recurring'  => $request->has('recurring') ? true : false,
    ];

    try {
        $notification->update($updateData);

        return redirect()->route('notification.list')->with('success', 'Notification updated successfully!');
    } catch (\Exception $e) {
        // rollback new image if something went wrong
        if ($request->hasFile('image') && isset($imagePath) && $imagePath !== $oldImagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        return redirect()->back()
                         ->with('error', 'Failed to update notification: ' . $e->getMessage())
                         ->withInput();
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);

        try {
            // Delete associated image file if it exists
            if ($notification->image) {
                Storage::disk('public')->delete($notification->image);
            }
            $notification->delete();
            return redirect()->route('notifications.list')->with('success', 'Notification deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete notification: ' . $e->getMessage());
        }
    }


    
public function fetchBySendto(Request $request, $type)
{
    // Validate sendto type
    $validTypes = [
        'school-pre-registration',
        'school-post-reg',
        'teacher-pre-registration',
        'teacher-post-registration',
    ];

    if (! in_array($type, $validTypes)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid sendto type.',
        ], 400);
    }

    // Fetch notifications for that sendto
    $notifications = NotificationModel::where('sendto', $type)
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json([
        'status' => 'success',
        'sendto' => $type,
        'count' => $notifications->count(),
        'data' => $notifications,
    ]);
}





}
