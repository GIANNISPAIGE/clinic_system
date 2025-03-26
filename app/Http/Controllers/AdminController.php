<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('adminlogin'); // Ensure this view exists
    }

    public function login(Request $request)
    {
        // Validate input fields
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Debugging: Check if the user exists
        $admin = Admin::where('username', $credentials['username'])->first();
        if (!$admin) {
            return back()->with('error', 'Admin not found.');
        }

        // Attempt login with the correct guard
        if (Auth::guard('admin')->attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return redirect()->route('patients.home');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function dashboard()
    {
        return view('patients.home'); // Ensure this exists
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Ensure logging out from admin guard
        return redirect()->route('admin.login.post');
    }
}
