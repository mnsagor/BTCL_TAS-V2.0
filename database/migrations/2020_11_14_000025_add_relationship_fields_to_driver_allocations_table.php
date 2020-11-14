<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDriverAllocationsTable extends Migration
{
    public function up()
    {
        Schema::table('driver_allocations', function (Blueprint $table) {
            $table->unsignedInteger('office_name_id');
            $table->foreign('office_name_id', 'office_name_fk_2585889')->references('id')->on('offices');
            $table->unsignedInteger('driver_name_id');
            $table->foreign('driver_name_id', 'driver_name_fk_2585890')->references('id')->on('drivers');
            $table->unsignedInteger('registration_number_id');
            $table->foreign('registration_number_id', 'registration_number_fk_2585891')->references('id')->on('vehicles');
        });
    }
}
