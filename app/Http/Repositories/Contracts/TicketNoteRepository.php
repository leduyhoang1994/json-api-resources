<?php

namespace App\Http\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TicketNoteRepository.
 *
 * @package namespace App\Http\Repositories\Contracts;
 */
interface TicketNoteRepository extends RepositoryInterface
{
    public function getDataBy($options = []);
    public function getById($id);
    public function create($data);
}
