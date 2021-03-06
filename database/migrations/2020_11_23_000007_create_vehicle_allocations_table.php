<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleAllocationsTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_allocations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('allotment_date');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
