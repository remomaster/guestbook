<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Role extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table){            
            $table->bigIncrements('id');
            $table->string('title');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['title' => 'Gast'],
            ['title' => 'Benutzer'],
            ['title' => 'Admin']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
