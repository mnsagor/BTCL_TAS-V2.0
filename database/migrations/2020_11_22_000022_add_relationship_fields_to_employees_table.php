<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id', 'designation_fk_2587232')->references('id')->on('designations');
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id', 'office_fk_2587233')->references('id')->on('offices');
        });
    }
}
