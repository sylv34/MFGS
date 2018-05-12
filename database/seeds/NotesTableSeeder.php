<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('notes')->insert(
    		[
    			['titre'=>"test", 'datePublication'=>now(), 'path'=>'root\path']
    		]
    	);
    }
}
