<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registration_number')->unique();
            $table->string('model')->nullable();
            $table->string('model_year')->nullable();
            $table->string('engine_capacity');
            $table->string('chassis_number')->unique();
            $table->string('engine_number')->unique();
            $table->string('condition')->nullable();
            $table->date('ragistration_date')->nullable();
            $table->date('fc_start_date');
            $table->date('fc_end_date');
            $table->date('tt_start_date');
            $table->date('tt_end_date');
            $table->string('fuel_consumption_rate')->nullable();
            $table->date('engine_overhaulting_date')->nullable();
            $table->string('vehicle_source')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('vehicle_allocation_status')->nullable();
            $table->string('driver_allocation_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
