<?php
// app/Http/Controllers/ImpersonationController.php
// app/Http/Controllers/ImpersonationController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ImpersonationController extends Controller
{
    public function impersonate($admin_id)
    {
        // Store the current superadmin ID in the session
        session(['original_user_id' => Auth::id()]);

        // Log in as the selected admin
        Auth::loginUsingId($admin_id);

        // Redirect to the admin dashboard
        return redirect('/admin/dashboard');
    }

    public function stopImpersonating()
    {
        // Retrieve the original superadmin ID from the session
        $originalUserId = session('original_user_id');

        // Log in as the original superadmin
        Auth::loginUsingId($originalUserId);

        // Clear the session value
        session()->forget('original_user_id');

        // Redirect to the superadmin dashboard
        return redirect('/superadmin/dashboard');
    }
}
