<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;

use App\Repositories\FidelityRepository;

class FidelityService
{
    use CrudMethods;

    protected $repository;

    public function __construct(FidelityRepository $repository)
    {
        $this->repository = $repository;
    }
}
