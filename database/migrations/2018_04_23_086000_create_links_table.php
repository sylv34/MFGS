<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('path');
            $table->unsignedInteger('user_id');
        });

        DB::table('links')->insert(
            [

                ['nom'=>'GIT', 'path'=>'https://github.com','user_id'=>1],
                ['nom'=>'Laravel', 'path'=>'https://laravel.com/docs','user_id'=>1],
                ['nom'=>'Laravel', 'path'=>'https://laravel.com/docs','user_id'=>1],
                ['nom'=>'Laravel', 'path'=>'https://laravel.com/docs','user_id'=>1],
                ['nom'=>'Laravel', 'path'=>'https://laravel.com/docs','user_id'=>1],
                ['nom'=>'Laravel', 'path'=>'https://laravel.com/docs','user_id'=>1],
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
        Schema::dropIfExists('links');
    }
}
