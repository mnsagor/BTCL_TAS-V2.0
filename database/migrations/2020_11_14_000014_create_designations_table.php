<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration
{
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('grade');
            $table->string('is_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
