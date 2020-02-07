<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->integer('quantity');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('observations')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petitions');
    }
}
