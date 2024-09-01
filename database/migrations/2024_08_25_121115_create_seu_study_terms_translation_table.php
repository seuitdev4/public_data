<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeuStudyTermsTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_terms_translation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_term_id')->constrained()->onDelete('cascade')->on('study_terms')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->unique(['study_term_id', 'locale']);
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
        Schema::dropIfExists('study_terms_translation');
    }
}
