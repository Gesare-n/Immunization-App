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
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guardian_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->integer('id_no')->unique();
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
