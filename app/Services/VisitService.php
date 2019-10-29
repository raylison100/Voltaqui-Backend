<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;

use App\Repositories\VisitsRepository;

class VisitService
{
    use CrudMethods;

    protected $repository;

    public function __construct(VisitsRepository $repository)
    {
        $this->repository = $repository;
    }
}
