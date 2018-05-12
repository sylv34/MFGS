<?php

use Illuminate\Database\Seeder;

class StatutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('statu_ddis')->insert(
    		[
    			['libelle'=>'En attente'],
    			['libelle'=>'En cours'],
    			['libelle'=>'Retardé'],
    			['libelle'=>'Cloturé'],
    		]
    	);
    }
}
