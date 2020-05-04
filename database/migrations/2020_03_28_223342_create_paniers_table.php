<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaniersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paniers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('prod_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();;
            $table->integer('quantity_prod');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prod_id')->references('id')->on('produits')->onDelete('cascade');
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
        Schema::dropIfExists('paniers');
    }
}
