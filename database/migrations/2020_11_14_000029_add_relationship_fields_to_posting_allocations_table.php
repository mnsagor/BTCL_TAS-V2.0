<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPostingAllocationsTable extends Migration
{
    public function up()
    {
        Schema::table('posting_allocations', function (Blueprint $table) {
            $table->unsignedInteger('name_id');
            $table->foreign('name_id', 'name_fk_2499044')->references('id')->on('drivers');
            $table->unsignedInteger('region_name_id');
            $table->foreign('region_name_id', 'region_name_fk_2499045')->references('id')->on('regions');
            $table->unsignedInteger('office_name_id');
            $table->foreign('office_name_id', 'office_name_fk_2499046')->references('id')->on('offices');
        });
    }
}
