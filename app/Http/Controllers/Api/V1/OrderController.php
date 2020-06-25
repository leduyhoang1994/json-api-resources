<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\CouponRepository;
use App\Http\Repositories\Contracts\OrderDetailRepository;
use App\Http\Repositories\Contracts\OrderRepository;
use App\Http\Repositories\Contracts\PackageRepository;
use App\Models\Coupon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	protected $repository, $couponRepository, $orderDetailRepository, $packageRepository;

	public function __construct(
		OrderRepository $repository,
		CouponRepository $couponRepository,
		OrderDetailRepository $orderDetailRepository,
		PackageRepository $packageRepository
	)
	{
		$this->repository = $repository;
		$this->couponRepository = $couponRepository;
		$this->orderDetailRepository = $orderDetailRepository;
		$this->packageRepository = $packageRepository;
	}

	public function getOne($id)
	{
		try {
			$order = $this->repository->find($id)->load(["details.package", "details.coupons"]);
			return $this->responseSuccess($order);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}

	public function create(Request $request)
	{
		try {
			$order = $this->repository->create($request->all());
			return $this->responseSuccess($order);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}

	public function update(Request $request, $id)
	{
		try {
			$order = $this->repository->find($id);
			$orderPrice = 0;
			if ($request->has('details')) {
				$details = $request->get('details');
				$existDetails = [];

				foreach ($details as $detailData) {
					if (!isset($detailData['package_id'])) {
						continue;
					}
					$detailData['order_id'] = $order->id;
					if (isset($detailData['id'])) {
						$detail = $this->orderDetailRepository->find($detailData['id']);
						$detail->fill($detailData);
					} else {
						$detail = $this->orderDetailRepository->create($detailData);
					}
					$package = $this->packageRepository->find($detail->package_id);

					$detail->price = $package->price;
					$detail->before_coupon_price = $package->price * $detail->quantity;
					$detail->final_price = $detail->before_coupon_price;

					$existDetails[] = $detail->id;
					$couponData = isset($detailData['coupons']) && is_array($detailData['coupons']) ? $detailData['coupons'] : [];
					$this->orderDetailRepository->addCoupons($detail, $couponData);
					$coupons = $this->couponRepository->findWhereIn('id', array_column($couponData, 'id'));

					foreach ($coupons as $coupon) {
						$detail->final_price = Coupon::applyDiscount($detail->final_price, $coupon);
					}
					$orderPrice += $detail->final_price;
					$detail->save();
				}

				$order->price = $orderPrice;
				$order->save();

				$this->orderDetailRepository->getDataBy([
					'order_id' => $order->id,
					'id_not_in' => $existDetails,
					'query' => true
				])->delete();
			}
			$order->load(["details.package", "details.coupons"]);
			return $this->responseSuccess($order);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}
}
