<?php

use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			"fit_1" => ["name" => "Lớp ưu tiên 1 Fit", "type" => "percent", "coupon_value" => 40],
			"fit_2" => ["name" => "Lớp ưu tiên 2 Fit", "type" => "percent", "coupon_value" => 43],
			"fit_3" => ["name" => "Lớp ưu tiên 3 Fit", "type" => "percent", "coupon_value" => 47],
			"star_1" => ["name" => "Lớp ưu tiên 1 Star", "type" => "percent", "coupon_value" => 25],
			"star_2" => ["name" => "Lớp ưu tiên 2 Star", "type" => "percent", "coupon_value" => 29],
			"star_3" => ["name" => "Lớp ưu tiên 2 Star", "type" => "percent", "coupon_value" => 29],
			"la_1" => ["name" => "Ưu đãi La", "type" => "percent", "coupon_value" => 25],
			"group_3" => ["name" => "Nhóm 3 người", "type" => "price", "coupon_value" => 100000],
		];

		foreach ($data as $code => $datum) {
			$package = \App\Models\Coupon::firstOrCreate([
				"code" => $code,
				"name" => $datum["name"],
				"type" => $datum["type"],
				"coupon_value" => $datum["coupon_value"],
			]);
			$package->save();
		}
	}
}
