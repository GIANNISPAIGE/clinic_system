<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientSession;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function index()
    {
        return view('analytics.index'); // Show the Blade file
    }

    public function fetchAnalytics(Request $request)
    {
        $year = $request->year ?? now()->year; // Default to current year

        // Fetch session count per month
        $sessionsPerMonth = PatientSession::selectRaw('MONTH(session_start_date) as month, COUNT(*) as total')
            ->whereYear('session_start_date', $year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Ensure all 12 months are included
        $formattedData = array_fill(0, 12, 0);
        foreach ($sessionsPerMonth as $month => $total) {
            $formattedData[$month - 1] = $total; // Adjust to zero-based index
        }

        return response()->json($formattedData);
    }
}
