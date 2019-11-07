<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAssessmentsTable.
 */
class CreateAssessmentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assessments', function(Blueprint $table) {
            $table->increments('id');
            $table->double("note");
            $table->unsignedInteger("restaurant_id");
            $table->unsignedInteger("client_id");

            $table->timestamps();
            $table->foreign('restaurant_id')
                ->references('id')->on('restaurants')
                ->onDelete('cascade');;
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade');;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assessments');
	}
}
