<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_absences', function (Blueprint $table) {
            $table->id();
            $table->enum('present', ['Hadir', 'Absen', 'Izin', 'Sakit'])->default('Absen');
            $table->unsignedBigInteger('student_id'); // student id unisgh
            $table->unsignedBigInteger('user_id'); // user_id unisgh
            $table->timestamps();

            // this is relational table
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_absences');
    }
};
