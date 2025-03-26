<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'username' => 'admin123',
            'password' => Hash::make('password123'),
        ]);
    }
    
}
