<?php

namespace App\Http\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AgentGroupRepository.
 *
 * @package namespace App\Http\Repositories\Contracts;
 */
interface AgentGroupRepository extends RepositoryInterface
{
    public function getDataBy($options = []);
}
