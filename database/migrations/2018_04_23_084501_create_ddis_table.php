<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->text('contenu');
            $table->text('commentaires')->nullable();
            $table->date('date_demande')->default(now());
            $table->unsignedInteger('droit_id');
            $table->unsignedInteger('demandeur_user_id');
            $table->unsignedInteger('concerne_user_id');
            $table->unsignedInteger('urgence_ddi_id');
            $table->unsignedInteger('statu_ddi_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ddis');
    }
}
