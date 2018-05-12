<?php

use Illuminate\Database\Seeder;

class DdisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
	         DB::table('ddis')->insert([
	            'titre' => 'titre ddi'.$i,
	            'contenu' => 'contenu ddi '.$i,
	            'date_demande'=> now(),
                'month' => $i,
	            'droit_id' => 1,
	            'demandeur_user_id' => 2,
	            'concerne_user_id' => 2,
	            'urgence_ddi_id' => 4
	        ]);    		
    	}
        for ($i=0; $i < 5; $i++) { 
             DB::table('ddis')->insert([
                'titre' => 'titre ddi'.$i,
                'contenu' => 'contenu ddi '.$i,
                'date_demande'=> now(),
                'month' => $i+4,
                'droit_id' => 1,
                'demandeur_user_id' => 2,
                'concerne_user_id' => 2,
                'urgence_ddi_id' => 3
            ]);         
        }
        DB::table('ddis')->insert([
                'titre' => 'titre ddi'.$i,
                'contenu' => 'contenu ddi '.$i,
                'date_demande'=> now(),
                'month' => 12,
                'droit_id' => 2,
                'demandeur_user_id' => 2,
                'concerne_user_id' => 2,
                'urgence_ddi_id' => 1
        ]);
    }
}
