<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->integer('price');
            $table->string('photo');
            $table->integer('quantity');
            $table->text('description');
            $table->string('categorie');
            $table->integer('confirm');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('produits');
    }
}
                     