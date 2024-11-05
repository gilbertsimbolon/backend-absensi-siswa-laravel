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
        Schema::create('class_of_students', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->unsignedBigInteger('teacher_id');
            $table->string('class_name');
            $table->timestamps();
            // This is relationship table
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_of_students');
    }
};
