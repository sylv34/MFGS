<?php

use Illuminate\Database\Seeder;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 10; $i++) { 
	         DB::table('ddis')->insert([
	            'titre' => 'titre ddi'.$i,
	            'contenu' => 'contenu ddi '.$i,
	            'date_demande'=> now(),
	            'droit_id' => 1,
	            'demandeur_user_id' => 2,
	            'concerne_user_id' => 2,
	            'urgence_ddi_id' => 1
	        ]);    		
    	}
        DB::table('ddis')->insert([
                'titre' => 'titre ddi'.$i,
                'contenu' => 'contenu ddi '.$i,
                'date_demande'=> now(),
                'droit_id' => 2,
                'demandeur_user_id' => 2,
                'concerne_user_id' => 2,
                'urgence_ddi_id' => 1
        ]);
    }
}
