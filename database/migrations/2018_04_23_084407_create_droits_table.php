<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDroitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->boolean('cadre');
        });
        DB::table('droits')->insert(
            [
                ['libelle'=>'Administrateur', 'cadre'=>true],
                ['libelle'=>'Comptabilite', 'cadre'=>true],
                ['libelle'=>'Comptabilite', 'cadre'=>false],
                ['libelle'=>'Communication', 'cadre'=>true],
                ['libelle'=>'Communication', 'cadre'=>false],
                ['libelle'=>'Optique', 'cadre'=>true],
                ['libelle'=>'Optique', 'cadre'=>false],
                ['libelle'=>'Audio', 'cadre'=>true],
                ['libelle'=>'Audio', 'cadre'=>false],
                ['libelle'=>'Ehpad', 'cadre'=>true],
                ['libelle'=>'Ehpad', 'cadre'=>false],
                ['libelle'=>'Ssiad', 'cadre'=>true],
                ['libelle'=>'Ssiad', 'cadre'=>false],
                ['libelle'=>'Logement', 'cadre'=>true],
                ['libelle'=>'Logement', 'cadre'=>false],
                ['libelle'=>'Clinique', 'cadre'=>true],
                ['libelle'=>'Clinique', 'cadre'=>false],
                ['libelle'=>'Tout_le_monde', 'cadre'=>false],
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
        Schema::dropIfExists('droits');
    }
}
