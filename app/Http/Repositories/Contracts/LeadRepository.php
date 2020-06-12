<?php

namespace App\Http\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LeadRepository.
 *
 * @package namespace App\Http\Repositories\Contracts;
 */
interface LeadRepository extends RepositoryInterface
{
    public function getDataBy($option = []);
    public function getById($id);
}
