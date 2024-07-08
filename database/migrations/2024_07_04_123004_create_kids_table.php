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
        Schema::create('kids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kid_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_birth')->nullable();
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('guardians');
            $table->integer('com_h_user_id')->unsigned();
            $table->foreign('com_h_user_id')->references('id')->on('users');
            $table->integer('hosp_user_id')->unsigned();
            $table->foreign('hosp_user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids');
    }
};
