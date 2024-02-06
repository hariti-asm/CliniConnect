<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema :: disableForeignKeyConstraints();
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->text('diagnosis');
            $table->unsignedBigInteger('prescription')->nullable();
            $table->unsignedBigInteger('certificate_id')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade')->where('user_type', 1); // Filter patients
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade')->where('user_type', 2); // Filter doctors
            $table->foreign('prescription')->references('id')->on('medications');
            $table->foreign('certificate_id')->references('id')->on('certificates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
};
