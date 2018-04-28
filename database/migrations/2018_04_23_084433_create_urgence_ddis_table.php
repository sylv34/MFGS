<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrgenceDdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urgence_ddis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
        });

        DB::table('urgence_ddis')->insert(
            [
                ['libelle'=>'Mineur'],
                ['libelle'=>'Moyen'],
                ['libelle'=>'Urgent'],
                ['libelle'=>'Bloquant'],
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
        Schema::dropIfExists('urgence_ddis');
    }
}
