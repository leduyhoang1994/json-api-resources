<?php

namespace App\Http\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Repositories\Contracts\OrderDetailRepository;
use App\Models\OrderDetail;
use App\Validators\OrderDetailValidator;

/**
 * Class OrderDetailRepositoryEloquent.
 *
 * @package namespace App\Http\Repositories\Eloquents;
 */
class OrderDetailRepositoryEloquent extends BaseRepository implements OrderDetailRepository
{
	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return OrderDetail::class;
	}

	protected function existOptions($options, $key)
	{
		return isset($options[$key]) && $options[$key];
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}

	public function getDataBy($options = [])
	{
		$model = new $this->model();

		if ($this->existOptions($options, 'order_id')) {
			$model = $model->where("order_id", $options['order_id']);
		}

		if ($this->existOptions($options, 'id_not_in')) {
			$model = $model->whereNotIn("id", $options['id_not_in']);
		}

		if ($this->existOptions($options, 'query')) {
			return $model;
		} else {
			return $model->get();
		}
	}

	public function addCoupons($detail, $coupons)
	{
		$couponIds = array_column($coupons, 'id');
		$detail->coupons()->sync($couponIds);
		return $detail;
	}

}
