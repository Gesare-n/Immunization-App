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
        Schema::create('kids_vaccines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kid_id')->unsigned();
            $table->foreign('kid_id')->references('id')->on('kids');
            $table->integer('vaccine_id')->unsigned();
            $table->foreign('vaccine_id')->references('id')->on('vaccines');
            $table->integer('hosp_user_id')->unsigned();
            $table->foreign('hosp_user_id')->references('id')->on('users');
            $table->date('exp_admin_date')->nullable();
            $table->date('admin_date')->nullable();
            $table->date('real_admin_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids_vaccines');
    }
};
