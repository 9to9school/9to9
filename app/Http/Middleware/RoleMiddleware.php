<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        
            $user = auth()->user();


           // If not logged in
            if (!$user) {

                $path = $request->path();

                // Redirect based on URL path
                if (str_starts_with($path, 'admin')) {
                    return redirect()->route('admin.loginform');
                } elseif (str_starts_with($path, 'school')) {
                    return redirect()->route('school.login');
                } elseif (str_starts_with($path, 'teacher')) {
                    return redirect()->route('teacher.login');
                }if (str_starts_with($path, 'marketing')) {
                    return redirect()->route('marketing.loginform');
                }

                return redirect('/'); 
            }
          
            if (!in_array($user->role, $roles)) {

                auth()->logout();
                // $request->session()->invalidate();
                // $request->session()->regenerateToken();
                return redirect('/');
            }

           
            return $next($request);
    }

    
}
