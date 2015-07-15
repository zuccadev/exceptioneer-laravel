<?php

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
            $table->string('name');
            $table->string('api_key');
            $table->timestamps();
        });

        Schema::table('notifications', function(Blueprint $table) {
            $table->integer('project_id')->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');

        Schema::table('notifications', function(Blueprint $table) {
            $table->dropColumn('project_id');
        });
    }
}
