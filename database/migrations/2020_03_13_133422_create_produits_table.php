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
            $table->integer('DemandeEnvoyer')->nullable();
            $table->double('average_rating')->nullable();
            $table->double('nb_rating')->nullable();
            $table->integer('confirm')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('DtEvoyerDm')->nullable();
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
                     