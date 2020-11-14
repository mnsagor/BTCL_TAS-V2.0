<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVehicleAllocationsTable extends Migration
{
    public function up()
    {
        Schema::table('vehicle_allocations', function (Blueprint $table) {
            $table->unsignedInteger('vehicle_id');
            $table->foreign('vehicle_id', 'vehicle_fk_2539424')->references('id')->on('vehicles');
            $table->unsignedInteger('region_id');
            $table->foreign('region_id', 'region_fk_2539425')->references('id')->on('regions');
            $table->unsignedInteger('division_id');
            $table->foreign('division_id', 'division_fk_2539426')->references('id')->on('offices');
            $table->unsignedInteger('allottee_name_id');
            $table->foreign('allottee_name_id', 'allottee_name_fk_2587296')->references('id')->on('employees');
            $table->unsignedInteger('allottee_designation_id');
            $table->foreign('allottee_designation_id', 'allottee_designation_fk_2587297')->references('id')->on('designations');
        });
    }
}
