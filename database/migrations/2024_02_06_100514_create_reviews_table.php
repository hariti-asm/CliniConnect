<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade')->where('user_type', 1); 
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade')->where('user_type', 2);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
