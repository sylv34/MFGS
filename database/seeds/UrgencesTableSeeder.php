<?php

use Illuminate\Database\Seeder;

class UrgencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urgence_ddis')->insert(
    		[
    			['libelle'=>'Mineur'],
    			['libelle'=>'Moyen'],
    			['libelle'=>'Urgent'],
    			['libelle'=>'Bloquant'],
    		]
    	);
    }
}
