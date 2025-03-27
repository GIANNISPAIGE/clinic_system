<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRegisterRequest;
use App\Http\Requests\PatientLoginRequest;
use App\Models\PatientProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    // Handle patient registration
    public function register(PatientRegisterRequest $request)
    {
        // Handle image upload
        $imagePath = $request->file('image') 
            ? $request->file('image')->store('patient_images', 'public') 
            : null;

        // Create the patient record
        PatientProfile::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'number' => $request->number,
            'impairments' => $request->impairments,
            'brgy' => $request->brgy,
            'municipality' => $request->municipality,
            'province' => $request->province,
            'image' => $imagePath,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('patient.login')->with('success', 'Registration successful. Please log in.');
    }

    // Handle login
    public function login(PatientLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if patient exists
        $patient = PatientProfile::where('email', $credentials['email'])->first();
        if (!$patient) {
            return back()->withErrors(['email' => 'No account found with this email.'])->withInput();
        }

        // Check if password is correct
        if (!Hash::check($credentials['password'], $patient->password)) {
            return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
        }

        // Attempt login using the 'patient_profile' guard
        if (Auth::guard('patient_profile')->attempt($credentials)) {
            return redirect()->route('patient_profiles.home');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Handle logout
    public function logout()
    {
        Auth::guard('patient_profile')->logout();
        return redirect()->route('patient.login')->with('success', 'Logged out successfully.');
    }

    // Patient home/dashboard
    public function home()
    {
        return view('patient_profiles.home');
    }
}
