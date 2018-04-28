<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('isAdmin')->default(false);
            $table->rememberToken();
            $table->unsignedInteger('droit_id');
        });
        DB::table('users')->insert(
            [
                //administrateur

                ['nom'=>'DIENST', 'prenom'=>'Sylvain', 'password' => Hash::make('sylvain1208'), 'email' => 'sylvain.dienst@gmail.com', 'droit_id' => 1, 'isAdmin'=>true],

                //comptable non cadre
                ['nom'=>'COMPTABLE', 'prenom'=>'non_cadre', 'password' => Hash::make('sylvain1208'), 'email' => 'comptable.nc@gmail.com', 'droit_id' => 3, 'isAdmin'=>false],
                //comptable cadre
                ['nom'=>'COMPTABLE', 'prenom'=>'cadre', 'password' => Hash::make('sylvain1208'), 'email' => 'comptable.c@gmail.com', 'droit_id' => 2, 'isAdmin'=>false],
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
        Schema::dropIfExists('users');
    }
}
