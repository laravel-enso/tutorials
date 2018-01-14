<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialsTable extends Migration
{
    public function up()
    {
        Schema::create('tutorials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('element');
            $table->string('title');
            $table->text('content', 65535);
            $table->tinyInteger('placement');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('tutorials');
    }
}
