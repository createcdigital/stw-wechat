<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('location_code')->default('');
			$table->string('business_name')->default('');
			$table->string('categories')->default('');
			$table->string('province')->default('');
			$table->string('city')->default('');
			$table->string('district')->default('');
			$table->integer('offset_type')->default(1);
			$table->string('longitude')->default('');
			$table->string('latitude')->default('');
			$table->string('address')->default('');
			$table->string('open_time')->default('');
			$table->text('introduction')->default('');
			$table->text('recommend')->default('');
			$table->text('special')->default('');
			$table->text('photo_list')->default('');
			$table->string('service_phone')->default('');
			$table->string('avg_price')->default('');
			$table->integer('is_recommend')->default(0); // 1: set to home page 0: not to recommend to homepage
			$table->integer('home_sort_index')->default(999); // from 1
			$table->integer('sort_index')->default(999); // from 1
			$table->string('status')->default(1); // 0: offline 1: online
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
		Schema::drop('stores');
	}

}
