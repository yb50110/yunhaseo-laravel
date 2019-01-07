<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tools')->insert(['name' => 'Adobe Photoshop']);
        DB::table('tools')->insert(['name' => 'Adobe Illustrator']);
        DB::table('tools')->insert(['name' => 'Adobe InDesign']);
        DB::table('tools')->insert(['name' => 'Figma']);
        DB::table('tools')->insert(['name' => 'InVision']);

        DB::table('tools')->insert(['name' => 'HTML/CSS']);
        DB::table('tools')->insert(['name' => 'Javascript/JQuery']);
        DB::table('tools')->insert(['name' => 'Git']);
        DB::table('tools')->insert(['name' => 'PhpStorm']);
        DB::table('tools')->insert(['name' => 'Laravel']);
        DB::table('tools')->insert(['name' => 'Angular JS']);
        DB::table('tools')->insert(['name' => 'Sencha Touch']);
        DB::table('tools')->insert(['name' => 'Angular']);

        DB::table('tools')->insert(['name' => 'Wordpress']);
        DB::table('tools')->insert(['name' => 'Trello']);
        DB::table('tools')->insert(['name' => 'Slack']);

        DB::table('tools')->insert(['name' => 'Graphite']);
        DB::table('tools')->insert(['name' => 'Charcoal']);
        DB::table('tools')->insert(['name' => 'Watercolor']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('tools')->delete();
    }
}
