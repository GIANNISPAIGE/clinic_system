<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Carbon\Carbon;

use PDF;

class PatientController extends Controller
{
     public function index()
    {
        $patients = Patient::orderBy('created_at', 'desc')->get();
        return view('patients.index', compact('patients'));
    }

    // ✅ Show new patients within a month
    public function newPatients()
    {
      $oneWeekAgo = Carbon::now()->subWeek();

$newPatients = Patient::where('created_at', '>=', $oneWeekAgo)
    ->orderBy('created_at', 'desc')
    ->get();

return view('patients.new', compact('newPatients'));
    }

    // ✅ This is the missing show() method
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }
    

 public function home()
    {
        // ✅ Get all addresses without the name
        $addresses = Patient::pluck('address');

        // ✅ Return the view with the addresses
        return view('patients.home')->with('addresses', $addresses);
    }
    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'impairments' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|string',
            'email' => 'required|email|unique:patients,email',
            'number' => 'required|string|max:15'
        ]);

        Patient::create($request->all());

        return redirect(url('/patients-list/new'))->with('success', 'Patient added successfully!');

    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'impairments' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|string',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'number' => 'required|string|max:15'
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }


   


 public function downloadPDF()
    {
        $patients = Patient::orderBy('created_at', 'desc')->get();
        $pdf = PDF::loadView('patients.pdf', compact('patients'));

        return $pdf->download('patient-list.pdf');
    }
}
