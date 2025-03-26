<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class UserSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'username' => 'admin123',
            'password' => Hash::make('password123'),
        ]);
    }
}
