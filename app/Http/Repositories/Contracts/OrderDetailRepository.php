<?php

namespace App\Http\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderDetailRepository.
 *
 * @package namespace App\Http\Repositories\Contracts;
 */
interface OrderDetailRepository extends RepositoryInterface
{
    public function getDataBy($options = []);
    public function addCoupons($id, $coupons);
}
