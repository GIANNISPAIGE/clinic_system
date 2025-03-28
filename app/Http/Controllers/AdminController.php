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
        // Validate input fields and return errors per field
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if admin exists
        $admin = Admin::where('username', $request->username)->first();
        if (!$admin) {
            return back()->withErrors(['username' => 'The Username or Password is not Correct.'])->withInput();
        }

        // Attempt login
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('patients.home');
        }

        return back()->withErrors(['password' => 'The Username or Password is not Correct'])->withInput();
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
