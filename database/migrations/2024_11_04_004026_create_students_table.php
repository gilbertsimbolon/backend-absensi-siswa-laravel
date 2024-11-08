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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn'); //primary
            $table->string('name');
            $table->unsignedInteger('parent_id');
            $table->string('phone');
            $table->unsignedBigInteger('class_of_student_id');
            $table->string('email'); //unique
            $table->string('gender');
            $table->string('place_born');
            $table->string('date_born');
            $table->string('address');
            $table->string('foto'); //nullable
            // $table->string('qr_code');
            $table->timestamps();

            // this is relationship table
            $table->foreign('parent_id')->references('id')->on('parent_of_students');
            $table->foreign('class_of_student_id')->references('id')->on('class_of_students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
