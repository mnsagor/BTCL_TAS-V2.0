<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaintenanceHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('maintenance_histories', function (Blueprint $table) {
            $table->unsignedInteger('region_name_id');
            $table->foreign('region_name_id', 'region_name_fk_2586335')->references('id')->on('regions');
            $table->unsignedInteger('office_name_id');
            $table->foreign('office_name_id', 'office_name_fk_2586336')->references('id')->on('offices');
            $table->unsignedInteger('registration_number_id');
            $table->foreign('registration_number_id', 'registration_number_fk_2586337')->references('id')->on('vehicles');
        });
    }
}
