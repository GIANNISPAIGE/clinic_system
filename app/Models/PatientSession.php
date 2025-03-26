<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PatientSession extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'session_start_date', 'session_end_date', 'session_status'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Fetch session counts by month (with full month name)
    public static function getMonthlySessions()
    {
        return self::selectRaw('YEAR(session_start_date) as year, DATE_FORMAT(session_start_date, "%M") as month, COUNT(id) as total')
            ->groupBy('year', 'month')
            ->orderByRaw('STR_TO_DATE(month, "%M")')
            ->get();
    }

    // Fetch session counts by year
    public static function getYearlySessions()
    {
        return self::selectRaw('YEAR(session_start_date) as year, COUNT(id) as total')
            ->groupBy('year')
            ->orderBy('year')
            ->get();
    }
}
