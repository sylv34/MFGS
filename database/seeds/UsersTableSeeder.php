<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}
