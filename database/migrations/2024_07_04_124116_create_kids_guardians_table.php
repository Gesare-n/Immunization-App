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
        Schema::create('kids_guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kid_id')->unsigned();
            $table->foreign('kid_id')->references('id')->on('kids');
            $table->integer('guardian_id')->unsigned();
            $table->foreign('guardian_id')->references('id')->on('guardians');
            $table->string('Relationship')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids_guardians');
    }
};
