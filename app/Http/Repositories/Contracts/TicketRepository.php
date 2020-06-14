<?php

namespace App\Http\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TicketRepository.
 *
 * @package namespace App\Http\Repositories\Contracts;
 */
interface TicketRepository extends RepositoryInterface
{
    public function getDataBy($options = []);
    public function getById($id);
    public function createTemp($data);
    public function create($data);
}
