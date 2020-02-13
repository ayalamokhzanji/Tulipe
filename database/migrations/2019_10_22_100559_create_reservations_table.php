<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('customer_id')->unsigned()->nullable();
            $table->BigInteger('user_id')->unsigned();
            $table->BigInteger('service_id')->unsigned();
            $table->Integer('quantity');
            $table->date('date');
            $table->string('period');
            $table->integer('amount')->default(value ('0'));


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
        Schema::dropIfExists('reservations');
    }
}
