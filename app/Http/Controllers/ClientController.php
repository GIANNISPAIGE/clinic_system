<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientSession;

class ClientController extends Controller
{
    public function home(Request $request)
    {
        $filter = $request->input('filter', 'monthly'); // Default to 'monthly'

        if ($filter === 'yearly') {
            $data = PatientSession::getYearlySessions();
        } else {
            $data = PatientSession::getMonthlySessions();
        }

        return view('patients.home', compact('data', 'filter'));
    }
}
