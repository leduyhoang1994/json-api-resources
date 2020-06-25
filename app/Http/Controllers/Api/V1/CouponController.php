<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\CouponRepository;
use Illuminate\Http\Request;

class CouponController extends Controller
{
	protected $repository;

	public function __construct(CouponRepository $repository)
	{
		$this->repository = $repository;
	}

	public function getAll()
	{
		try {
			$coupon = $this->repository->all();
			return $this->responseSuccess($coupon);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}

	public function getOne($id)
	{
		try {
			$coupon = $this->repository->find($id)->load("packages.package.coupons");
			return $this->responseSuccess($coupon);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}

	public function create(Request $request)
	{
		try {
			$coupon = $this->repository->create($request->all());
			return $this->responseSuccess($coupon);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}

	public function update(Request $request)
	{

	}
}
