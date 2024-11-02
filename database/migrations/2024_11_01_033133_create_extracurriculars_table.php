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
        Schema::create('extracurriculars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_of_student_id');
            $table->string('days');
            $table->string('time');
            $table->string('activity');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            // this is relationship table
            $table->foreign('class_of_student_id')->references('id')->on('class_of_students');
            $table->foreign('teacher_id')->references('id')->on('class_of_students');
            $table->foreign('user_id')->references('id')->on('class_of_students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracurriculars');
    }
};
