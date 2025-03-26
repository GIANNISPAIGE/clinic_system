<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;

class ReferralController extends Controller
{
    public function index()
    {
        $referrals = Referral::all();
        return view('referrals.index', compact('referrals'));
    }

    public function create()
    {
        return view('referrals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'age' => 'required|integer|min:0',
            'sex' => 'required|in:Male,Female,Other',
            'date' => 'required|date',
            'instruction' => 'nullable|string|max:53333',
            'source_clinic' => 'required|string|max:255',
            'doctor' => 'required|string|max:255',
        ]);

        Referral::create($request->all());
        return redirect()->route('referrals.index')->with('success', 'Referral added successfully.');
    }

    public function edit(Referral $referral)
    {
        return view('referrals.edit', compact('referral'));
    }

    public function update(Request $request, Referral $referral)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'age' => 'required|integer|min:0',
            'sex' => 'required|in:Male,Female,Other',
            'date' => 'required|date',
            'instruction' => 'nullable|string|max:53333',
            'source_clinic' => 'required|string|max:255',
            'doctor' => 'required|string|max:255',
        ]);

        $referral->update($request->all());
        return redirect()->route('referrals.index')->with('success', 'Referral updated successfully.');
    }
}

