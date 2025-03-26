<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientSession;
use App\Models\Patient;
use Carbon\Carbon;

class PatientSessionController extends Controller
{
    public function index()
    {
        $sessions = PatientSession::with('patient')->get();
        return view('patient_sessions.index', compact('sessions'));
    }

    public function create()
    {
        $oneWeekAgo = Carbon::now()->subWeek();
        $patients = Patient::where('created_at', '>=', $oneWeekAgo)->get();
        return view('patient_sessions.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'session_start_date' => 'required|date',
            'session_end_date' => 'nullable|date|after_or_equal:session_start_date',
            'session_status' => 'required|in:Scheduled,Ongoing,Completed',
        ]);

        PatientSession::create($request->all());

        return redirect()->route('patient_sessions.index')->with('success', 'Session created successfully.');
    }

    public function edit(PatientSession $patientSession)
    {
        $oneWeekAgo = Carbon::now()->subWeek();
        $patients = Patient::where('created_at', '>=', $oneWeekAgo)->get();
        return view('patient_sessions.edit', compact('patientSession', 'patients'));
    }

    public function update(Request $request, PatientSession $patientSession)
    {
        $request->validate([
            'session_start_date' => 'required|date',
            'session_end_date' => 'nullable|date|after_or_equal:session_start_date',
            'session_status' => 'required|in:Scheduled,Ongoing,Completed',
        ]);

        $patientSession->update($request->all());

        return redirect()->route('patient_sessions.index')->with('success', 'Session updated successfully.');
    }

    public function destroy(PatientSession $patientSession)
    {
        $patientSession->delete();
        return redirect()->route('patient_sessions.index')->with('success', 'Session deleted successfully.');
    }

    /**
     * Fetch sessions for FullCalendar
     */
    public function calendar()
    {
        $sessions = PatientSession::with('patient')->get();
        $events = [];

        foreach ($sessions as $session) {
            $events[] = [
                'id' => $session->id,
                'title' => $session->patient->firstname . ' ' . $session->patient->lastname,
                'start' => $session->session_start_date,
                'end' => $session->session_end_date,
                'color' => $session->session_status === 'Completed' ? 'green' : ($session->session_status === 'Cancelled' ? 'red' : 'blue'),
                'url' => route('patient_sessions.edit', $session->id),
            ];
        }

        return response()->json($events);
    }
}
