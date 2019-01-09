<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert(['name' => 'Front-End Developer']);
        DB::table('roles')->insert(['name' => 'Back-End Developer']);
        DB::table('roles')->insert(['name' => 'Graphic Designer']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('roles')->delete();
    }
}
