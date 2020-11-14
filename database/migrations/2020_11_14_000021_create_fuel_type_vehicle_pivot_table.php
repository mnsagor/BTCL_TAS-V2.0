<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelTypeVehiclePivotTable extends Migration
{
    public function up()
    {
        Schema::create('fuel_type_vehicle', function (Blueprint $table) {
            $table->unsignedInteger('vehicle_id');
            $table->foreign('vehicle_id', 'vehicle_id_fk_2499168')->references('id')->on('vehicles')->onDelete('cascade');
            $table->unsignedInteger('fuel_type_id');
            $table->foreign('fuel_type_id', 'fuel_type_id_fk_2499168')->references('id')->on('fuel_types')->onDelete('cascade');
        });
    }
}
