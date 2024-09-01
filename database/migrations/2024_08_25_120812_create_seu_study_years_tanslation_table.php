<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeuStudyYearsTanslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_years_translation', function (Blueprint $table) {
                $table->id();
                $table->foreignId('study_year_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->on('study_years');
                $table->string('locale')->index();
                $table->string('title');
                $table->unique(['study_year_id', 'locale']);
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
        Schema::dropIfExists('study_years_translation');
    }
}
