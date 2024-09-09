<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGraduatedStudentReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduated_student_reports', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_saudi');
            $table->enum('gender', ['male', 'female']);
            $table->unsignedBigInteger('count');
             $table->foreignId('year_id')->references('id')->on('study_years')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('faculty_id')->references('id')->on('faculties')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduated_student_reports');
    }
}
