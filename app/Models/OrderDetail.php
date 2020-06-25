<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table = "order_detail";
	protected $fillable = ['order_id', 'package_id', 'price', 'quantity', 'before_coupon_price', 'final_price'];

	public function package()
	{
		return $this->hasOne(Package::class, 'id', 'package_id');
	}

	public function coupons()
	{
		return $this->belongsToMany(Coupon::class, OrderDetailCoupon::class, 'order_detail_id', 'coupon_id', 'id', 'id');
	}
}
