<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;

use App\Repositories\ClientRepository;

class ClientService
{
    use CrudMethods;

    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }
}
