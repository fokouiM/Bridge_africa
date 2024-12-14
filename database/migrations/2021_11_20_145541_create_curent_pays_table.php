<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurentPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curent_pays', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->nullable();
            $table->string('credit')->nullable();
            $table->string('affaire')->nullable();
            $table->string('statut')->nullable();
            $table->string('prix')->nullable();
            $table->string('codepay')->nullable();
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
        Schema::dropIfExists('curent_pays');
    }
}
