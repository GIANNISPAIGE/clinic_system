<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->string('number');
            $table->string('impairments')->nullable();
            $table->string('brgy');
            $table->string('municipality');
            $table->string('province');
            $table->string('image')->nullable(); // New image field
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_profiles');
    }
};
