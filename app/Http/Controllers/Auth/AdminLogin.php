<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogin extends Controller
{
    public function showForm(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return view('admin.other.login');
    }

    public function login(Request $request)
    {

        if (Auth::guard('admin')->check()) {
            return;
        }


        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return [
                'success' => true,
                'error' => false
            ];

            // return redirect()->intended('admin/dashboard'); // Redirect to admin dashboard
        }

        return [
            'success' => false,
            'error' => 'Invalid login credentials'
        ];
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login')); // Redirect to admin login page
    }
}
