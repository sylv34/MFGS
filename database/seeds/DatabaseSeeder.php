<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(DroitsTableSeeder::class);
        $this->call(UrgencesTableSeeder::class);
        $this->call(StatutTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        $this->call(DroitNoteTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LinksTableSeeder::class);
        $this->call(DdisTableSeeder::class);
    }
}
