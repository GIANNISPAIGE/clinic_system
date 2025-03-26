<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    // Show Appointments List
    public function index()
    {
        $appointments = Appointment::with('patient')->orderBy('appointment_time', 'asc')->get();
        return view('appointments.index', compact('appointments'));
    }

    // Show Create Appointment Form
    public function create()
    {
        $oneWeekAgo = Carbon::now()->subWeek();

        $patients = Patient::where('created_at', '>=', $oneWeekAgo)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('appointments.create', compact('patients'));
    }

    // Store a New Appointment
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_time' => 'required|date|after:now'
        ]);

        Appointment::create([
            'patient_id' => $request->patient_id,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending'
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment scheduled successfully!');
    }
    public function destroy(Appointnment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Patient deleted successfully!');
    }

    // Cancel Appointment
    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'canceled']);

        return redirect()->route('appointments.index')->with('success', 'Appointment canceled.');
    }


    // Complete Appointment
    public function complete($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'completed']);

        return redirect()->route('appointments.index')->with('success', 'Appointment marked as completed.');
    }

    // Reschedule Appointment
    public function reschedule(Request $request, $id)
    {
        $request->validate(['appointment_time' => 'required|date|after:now']);

        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'appointment_time' => $request->appointment_time,
            'status' => 'rescheduled'
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment rescheduled.');
    }
}
