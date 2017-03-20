<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTutorialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutorials', function(Blueprint $table) {

			$table->increments('id');
            $table->integer('permission_id')->unsigned()->index('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('restrict')->onDelete('restrict');
            $table->string('element');
            $table->string('title');
            $table->text('content', 65535);
            $table->string('placement');
            $table->integer('order')->default(1);
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
		Schema::drop('tutorials');
	}
}
