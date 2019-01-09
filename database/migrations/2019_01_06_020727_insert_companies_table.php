<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('companies')->insert(['name' => 'B507: A Creative Media Mob', 'location' => 'Mankato, Minnesota']);
        DB::table('companies')->insert(['name' => 'B302: A Creative Media Mob', 'location' => 'Arnhem, Netherlands']);
        DB::table('companies')->insert(['name' => 'Freelance project', 'location' => '']);
        DB::table('companies')->insert(['name' => 'Passion project', 'location' => '']);
        DB::table('companies')->insert(['name' => 'Academic project', 'location' => '']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('companies')->delete();
    }
}
