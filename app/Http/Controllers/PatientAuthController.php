<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRegisterRequest;
use App\Http\Requests\PatientLoginRequest;
use App\Models\PatientProfile;
use Illuminate\Http\Request;
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
        return redirect()->route('patient.login.post')->with('success', 'Logged out successfully.');
    }

    // Patient home/dashboard
    public function home()
    {
        return view('patient_profiles.home');

    }
  public function index()
{
    $patient_profiles = PatientProfile::where('id', Auth::id())->firstOrFail(); // Fetch the authenticated user's profile
    return view('patient_profiles.index_profile', compact('patient_profiles'));
}

public function edit()
{
    $patient_profiles = PatientProfile::where('id', Auth::id())->firstOrFail(); // Ensure the user is editing their own profile
    return view('patient_profiles.edit_profile', compact('patient_profiles'));
}

public function update(Request $request)
{
    $patient = PatientProfile::where('id', Auth::id())->firstOrFail();

    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'birthdate' => 'required|date',
        'email' => 'required|email|unique:patient_profiles,email,' . Auth::id(),
        'number' => 'required|string|max:15',
        'impairments' => 'nullable|string',
        'brgy' => 'required|string|max:255',
        'municipality' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        'password' => 'nullable|min:8|confirmed',
    ]);

    $data = $request->except(['password', 'image']);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $patient->update($data);

    return redirect()->route('patient_profiles.index')->with('success', 'Your profile has been updated successfully.');
}
}
