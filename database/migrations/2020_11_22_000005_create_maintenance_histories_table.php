<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('maintenance_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('cost');
            $table->longText('work_detail');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
