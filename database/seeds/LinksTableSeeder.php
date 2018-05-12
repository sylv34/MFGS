<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert(
    		[

    			['nom'=>'GIT', 'path'=>'https://github.com','user_id'=>1],
    			['nom'=>'Facebook', 'path'=>'https://Facebook.com','user_id'=>1],
    			['nom'=>'Laravel', 'path'=>'https://laravel.com/docs','user_id'=>1],
    			['nom'=>'Bootstrap', 'path'=>'https://getbootstrap.com/docs/','user_id'=>1],
                ['nom'=>'Google', 'path'=>'https://google.fr','user_id'=>1],
                ['nom'=>'Linkedin', 'path'=>'https://linkedin.fr','user_id'=>1],
                ['nom'=>'Tweeter', 'path'=>'https://twitter.com/?lang=fr','user_id'=>1],
    			['nom'=>'Php doc', 'path'=>'http://php.net/manual/fr/','user_id'=>1],

    		]
    	);
    }
}
