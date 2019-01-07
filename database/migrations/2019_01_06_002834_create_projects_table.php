<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();

            $table->timestamps();
            $table->string('name');
            $table->boolean('featured');
            $table->longText('description');
            $table->string('year');
            $table->string('url')->nullable();
            $table->string('image_url')->nullable();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
