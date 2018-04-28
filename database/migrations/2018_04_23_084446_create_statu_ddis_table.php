<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatuDdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statu_ddis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
        });

        DB::table('statu_ddis')->insert(
            [
                ['libelle'=>'En attente'],
                ['libelle'=>'En cours'],
                ['libelle'=>'Retardé'],
                ['libelle'=>'Cloturé'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statu_ddis');
    }
}
