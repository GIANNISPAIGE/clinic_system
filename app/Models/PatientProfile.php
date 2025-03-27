<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PatientProfile extends Authenticatable
{
    use HasFactory;
 protected $table = 'patient_profiles';
    protected $fillable = [
        'firstname',
        'lastname',
        'birthdate',
        'email',
        'number',
        'impairments',
        'brgy',
        'municipality',
        'province',
        'image', // Add image to fillable attributes
        'password',
    ];

    protected $hidden = [
        'password',
    ];
    public function patientProfile()
{
    return $this->hasOne(PatientProfile::class);
}

}

