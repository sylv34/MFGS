<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function(Blueprint $table){
            $table
                ->foreign('droit_id')
                ->references('id')
                ->on('droits')
                ->onDelete('cascade');
        });
        
        Schema::table('droit_note', function(Blueprint $table){
            $table
                ->foreign('note_id')
                ->references('id')
                ->on('notes')
                ->onDelete('cascade');

            $table
                ->foreign('droit_id')
                ->references('id')
                ->on('droits')
                ->onDelete('cascade');
        });

        Schema::table('ddis', function(Blueprint $table){
            $table
                ->foreign('droit_id')
                ->references('id')
                ->on('droits')
                ->onDelete('cascade');

            $table
                ->foreign('demandeur_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('concerne_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('urgence_ddi_id')
                ->references('id')
                ->on('urgence_ddis')
                ->onDelete('cascade');

            $table
                ->foreign('statu_ddi_id')
                ->references('id')
                ->on('statu_ddis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_droit_id_foreign');
        });

        Schema::table('droit_note', function(Blueprint $table){
            $table->dropForeign('droit_note_droit_id_foreign');
            $table->dropForeign('droit_note_note_id_foreign');
        });

        Schema::table('ddis', function(Blueprint $table){
            
            $table->dropForeign('ddis_demandeur_user_id_foreign');
            $table->dropForeign('ddis_concerne_user_id_foreign');
            $table->dropForeign('ddis_urgence_ddi_id_foreign');
            $table->dropForeign('ddis_statu_ddi_id_foreign');
            $table->dropForeign('ddis_droit_id_foreign');
        });
    }
}
