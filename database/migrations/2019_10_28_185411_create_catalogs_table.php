<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCatalogsTable.
 */
class CreateCatalogsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogs', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("restaurant_id");
            $table->string("image");
            $table->timestamps();

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
		Schema::drop('catalogs');
	}
}
