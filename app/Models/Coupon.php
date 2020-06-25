<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
	protected $table = "coupon";

	const DISCOUNT_PERCENT = 'percent';
	const DISCOUNT_PRICE = 'price';

	public static function applyDiscount($price, $coupon)
	{
		switch ($coupon->type) {
			case Coupon::DISCOUNT_PERCENT:
				return $price - (($price * $coupon->coupon_value) / 100);
			case Coupon::DISCOUNT_PRICE:
				return $price - $coupon->coupon_value;
		}
	}
}
