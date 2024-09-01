<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('semester_id')->constrained()->onDelete('cascade');
                $table->string('locale')->index();
                $table->string('title');
                $table->unique(['semester_id', 'locale']);
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
        Schema::dropIfExists('semester_translations');
    }
}
