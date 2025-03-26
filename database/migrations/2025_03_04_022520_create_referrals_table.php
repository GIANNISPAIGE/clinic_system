<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->text('address');
            $table->integer('age');
            $table->enum('sex', ['Male', 'Female', 'Other']);
            $table->date('date');
            $table->string('source_clinic');
            $table->string('doctor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
