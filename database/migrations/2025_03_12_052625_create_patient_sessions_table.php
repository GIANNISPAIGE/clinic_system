<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('patient_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->date('session_start_date');
            $table->date('session_end_date');
            $table->enum('session_status', ['Scheduled', 'Ongoing', 'Completed'])->default('Scheduled');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_sessions');
    }
};
