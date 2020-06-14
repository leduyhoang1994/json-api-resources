<?php

namespace App\Http\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Http\Repositories\Contracts;
 */
interface UserRepository extends RepositoryInterface
{
    public function getDataBy($option = []);
    public function getById($id);
    public function update($id, $data);
}
