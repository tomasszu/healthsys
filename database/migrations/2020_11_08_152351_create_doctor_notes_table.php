<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_notes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('reporting_doctor_id');
            $table->unsignedBigInteger('recepient')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('reporting_doctor_id')->references('id')->on('doctors');
            $table->foreign('recepient')->references('id')->on('doctors');
            $table->text('diagnosis')->nullable();
            $table->text('complications')->nullable();
            $table->text('recomendations');
            $table->text('regime')->nullable();
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
        Schema::dropIfExists('doctor_notes');
    }
}
