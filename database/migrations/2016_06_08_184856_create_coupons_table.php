<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('store_id');
			$table->string('store_name');
			$table->integer('package_count')->default(0);

			$table->string('package_a_title')->default('');
			$table->double('package_a_price_children', 5,2)->default(0);
			$table->double('package_a_price_adult', 5,2)->default(0);
			$table->double('package_a_price_family', 5,2)->default(0);
			$table->string('package_a_available_date')->default('');
			$table->integer('package_a_quantity')->default(0);
			$table->text('package_a_image')->default('');
			$table->text('package_a_description')->default('');

			$table->string('package_b_title')->default('');
			$table->double('package_b_price_children', 5,2)->default(0);
			$table->double('package_b_price_adult', 5,2)->default(0);
			$table->double('package_b_price_family', 5,2)->default(0);
			$table->string('package_b_available_date')->default('');
			$table->integer('package_b_quantity')->default(0);
			$table->text('package_b_image')->default('');
			$table->text('package_b_description')->default('');

			$table->string('package_c_title');
			$table->double('package_c_price_children', 5,2)->default(0);
			$table->double('package_c_price_adult', 5,2)->default(0);
			$table->double('package_c_price_family', 5,2)->default(0);
			$table->string('package_c_available_date')->default('');
			$table->integer('package_c_quantity')->default(0);
			$table->text('package_c_image')->default('');
			$table->text('package_c_description')->default('');

			$table->string('package_d_title')->default('');
			$table->double('package_d_price_children', 5,2)->default(0);
			$table->double('package_d_price_adult', 5,2)->default(0);
			$table->double('package_d_price_family', 5,2)->default(0);
			$table->string('package_d_available_date')->default('');
			$table->integer('package_d_quantity')->default(0);
			$table->text('package_d_image')->default('');
			$table->text('package_d_description')->default('');

			$table->string('package_e_title')->default('');
			$table->double('package_e_price_children', 5,2)->default(0);
			$table->double('package_e_price_adult', 5,2)->default(0);
			$table->double('package_e_price_family', 5,2)->default(0);
			$table->string('package_e_available_date')->default('');
			$table->integer('package_e_quantity')->default(0);
			$table->text('package_e_image')->default('');
			$table->text('package_e_description')->default('');

			$table->string('package_f_title')->default('');
			$table->double('package_f_price_children', 5,2)->default(0);
			$table->double('package_f_price_adult', 5,2)->default(0);
			$table->double('package_f_price_family', 5,2)->default(0);
			$table->string('package_f_available_date')->default('');
			$table->integer('package_f_quantity')->default(0);
			$table->text('package_f_image')->default('');
			$table->text('package_f_description')->default('');

			$table->string('package_g_title')->default('');
			$table->double('package_g_price_children', 5,2)->default(0);
			$table->double('package_g_price_adult', 5,2)->default(0);
			$table->double('package_g_price_family', 5,2)->default(0);
			$table->string('package_g_available_date')->default('');
			$table->integer('package_g_quantity')->default(0);
			$table->text('package_g_image')->default('');
			$table->text('package_g_description')->default('');

			$table->string('package_h_title')->default('');
			$table->double('package_h_price_children', 5,2)->default(0);
			$table->double('package_h_price_adult', 5,2)->default(0);
			$table->double('package_h_price_family', 5,2)->default(0);
			$table->string('package_h_available_date')->default('');
			$table->integer('package_h_quantity')->default(0);
			$table->text('package_h_image')->default('');
			$table->text('package_h_description')->default('');

			$table->integer('status'); // 0: disable 1: enabled
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
		Schema::drop('coupons');
	}

}
