<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVisitsTable.
 */
class CreateVisitsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visits', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("client_id");
            $table->unsignedInteger("restaurant_id");
            $table->timestamps();

            $table->foreign('client_id')
                ->references('id')->on('clients');

            $table->foreign('restaurant_id')
                ->references('id')->on('restaurants');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visits');
	}
}
