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

        return redirect()->route('patient.login.post')->with('success', 'Registration successful. Please log in.');
    }

    // Handle login
    public function login(PatientLoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function home(){
        return view('patient_profiles.home');
    }
}
