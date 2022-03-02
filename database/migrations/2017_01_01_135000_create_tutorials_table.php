<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('order_index');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('tutorials');
    }
};
