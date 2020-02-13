<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('phone_number2')->nullable();
            $table->string('facebook')->nullable(); 
            $table->integer('price')->nullable();
            $table->integer('capacity')->nullable();
             //  الاسم ولا الايميل هما ميتكرروش
            $table->longText('description', 255)->nullable();

            $table->bigInteger('location_id')->unsigned()->nullable();
            


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
        Schema::dropIfExists('user_informations');
    }
}
