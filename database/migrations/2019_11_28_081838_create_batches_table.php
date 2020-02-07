<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('description')->nullable();
            $table->string('delivery_direction')->nullable();
            $table->date('pickup_date')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('donor_company')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
    }
}
