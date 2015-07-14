<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('exception_class');
            $table->string('message');
            $table->integer('line');
            $table->string('file');
            $table->text('trace');
            $table->string('path');
            $table->string('uri');
            $table->string('method');
            $table->string('client_ip');
            $table->text('user_agent');
            $table->dateTime('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifications');
    }
}
