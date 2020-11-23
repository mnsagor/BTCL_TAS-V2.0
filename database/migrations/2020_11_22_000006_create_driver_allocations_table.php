<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverAllocationsTable extends Migration
{
    public function up()
    {
        Schema::create('driver_allocations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('allocation_date');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
