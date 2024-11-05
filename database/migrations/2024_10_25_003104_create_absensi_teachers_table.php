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
        Schema::create('absensi_teachers', 
        function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('date');
            $table->string('status');
            $table->string('note');
            $table->string('qr_code');
            // $table->string('time_in');
            // $table->string('time_out');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_teachers');
    }
};
