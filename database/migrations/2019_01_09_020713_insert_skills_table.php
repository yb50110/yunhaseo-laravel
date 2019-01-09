<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('skills')->insert(['name' => 'Worked remotely with a team in different time zones']);
        DB::table('skills')->insert(['name' => 'Picked up in-progress project until completion']);
        DB::table('skills')->insert(['name' => 'Presented progress to client and other stakeholders']);
        DB::table('skills')->insert(['name' => 'Practiced Agile methodologies']);
        DB::table('skills')->insert(['name' => 'Collaborated with designers']);
        DB::table('skills')->insert(['name' => 'Pair-programmed and conducted code review']);
        DB::table('skills')->insert(['name' => 'Practiced documentation in code']);
        DB::table('skills')->insert(['name' => 'Followed coding conventions and best practices']);
        DB::table('skills')->insert(['name' => 'Worked in a team of over 5 developers']);
        DB::table('skills')->insert(['name' => 'Learned and implemented new tools']);
        DB::table('skills')->insert(['name' => 'Completed project in tight deadline']);
        DB::table('skills')->insert(['name' => 'Followed established style guide of company in design']);
        DB::table('skills')->insert(['name' => 'Reduced unnecessary distraction']);
        DB::table('skills')->insert(['name' => 'Research on similar services to maintain familiarity for users']);
        DB::table('skills')->insert(['name' => 'Maintained proficiency in fast-paced schedule']);
        DB::table('skills')->insert(['name' => 'Created mockups for design presentation']);
        DB::table('skills')->insert(['name' => 'Presented to non-native English speakers']);
        DB::table('skills')->insert(['name' => 'Worked with ambiguous or insufficient project details']);
        DB::table('skills')->insert(['name' => 'Utilized digital mediums for communication']);
        DB::table('skills')->insert(['name' => 'Expressed personal experience through illustration']);
        DB::table('skills')->insert(['name' => 'Interviewed target audience']);
        DB::table('skills')->insert(['name' => 'Conducted various user testing for usability']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('skills')->delete();
    }
}
