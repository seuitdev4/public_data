<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentReportPerDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_department_reports', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['male', 'female']);
            $table->string('student_level');
            $table->string('count');
            $table->foreignId('faculty_department_id')->references('id')->on('faculty_departments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('faculty_id')->references('id')->on('faculties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('study_year_id')->references('id')->on('study_years')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('study_term_id')->nullable()->references('id')->on('study_terms')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('student_report_per_departments');
    }
}
