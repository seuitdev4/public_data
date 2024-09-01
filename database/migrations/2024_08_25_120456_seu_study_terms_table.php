<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeuStudyTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_terms', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('study_year_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->on('study_years');
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
        Schema::dropIfExists('study_terms');
    }
}
