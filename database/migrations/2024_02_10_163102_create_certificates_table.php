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
    {        schema::disableForeignKeyConstraints();

        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->text('description')->nullable(); 
            $table->date('date_received'); 
            $table->string('issuer'); 
            $table->date('expiration_date')->nullable(); // Date when the certificate expires (nullable)
            $table->foreignId('patient_id')->nullable()->constrained('users')->where('user_type', 1);
            $table->foreignId('doctor_id')->nullable()->constrained('users')->where('user_type', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
};
