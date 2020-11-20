<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('emp_type')->nullable();
            $table->string('emp_number')->nullable();
            $table->string('mobile')->unique();
            $table->string('dl_number')->unique();
            $table->date('dl_validity_year');
            $table->string('is_posted')->nullable();
            $table->string('is_allocated')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
