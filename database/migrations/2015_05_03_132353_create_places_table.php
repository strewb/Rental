<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('places', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('property_type');
            $table->string('room');
            $table->string('location');
            $table->string('available_from');
            $table->string('pictures');
            $table->string('phone');
            $table->string('email');
            $table->string('status');
            $table->string('price');
            $table->integer('user_id');
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
        Schema::drop('places');
    }
}