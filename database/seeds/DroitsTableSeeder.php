<?php

use Illuminate\Database\Seeder;

class DroitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('droits')->insert(
    		[
    			['libelle'=>'Informatique', 'cadre'=>true],
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
}
