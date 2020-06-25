<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			"fit_50" => ["name" => "Fit 50 buổi", "price" => "5000000"],
			"fit_30" => ["name" => "Fit 30 buổi", "price" => "3000000"],
			"star_48" => ["name" => "Star 48 buổi", "price" => "7200000"],
			"star_24" => ["name" => "Star 24 buổi", "price" => "3600000"],
			"la_plus_60" => ["name" => "La Plus 60 buổi", "price" => "30000000"],
			"la_plus_40" => ["name" => "La Plus 40 buổi", "price" => "20000000"],
		];

		foreach ($data as $code => $datum) {
			$package = \App\Models\Package::firstOrCreate([
				"code" => $code,
				"name" => $datum["name"],
				"price" => $datum["price"]
			]);
			$package->save();
		}
	}
}
