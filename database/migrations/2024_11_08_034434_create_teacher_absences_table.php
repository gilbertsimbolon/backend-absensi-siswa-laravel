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
        Schema::create('teacher_absences', function (Blueprint $table) {
            $table->id();
            $table->enum('present', ['H', 'A', 'I', 'S'])->default('A');
            $table->unsignedBigInteger('teachers_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // this is relational table
            $table->foreign('teachers_id')->references('id')->on('teachers');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_absences');
    }
};
