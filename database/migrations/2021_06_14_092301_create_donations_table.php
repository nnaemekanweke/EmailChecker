<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('amount_donated')->nullable();
            $table->string('amount_settled')->nullable();
            $table->string('processor_fee')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number', 100)->nullable();
            $table->string('country')->nullable();
            $table->string('status')->nullable();
            $table->string('date')->nullable();
            $table->string('transaction_ref')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
