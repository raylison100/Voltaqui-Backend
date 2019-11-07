<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCommentsTable.
 */
class CreateCommentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("assessment_id");
            $table->string("message",400);
            $table->unsignedInteger("restaurant_id");
            $table->unsignedInteger("client_id");

            $table->timestamps();
            $table->foreign('restaurant_id')
                ->references('id')->on('restaurants');
            $table->foreign('client_id')
                ->references('id')->on('clients');
            $table->foreign('assessment_id')
                ->references('id')->on('assessments');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}
}
