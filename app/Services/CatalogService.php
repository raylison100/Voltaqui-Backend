<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;

use App\Repositories\CatalogsRepository;

class CatalogService
{
    use CrudMethods;

    protected $repository;

    public function __construct(CatalogsRepository $repository)
    {
        $this->repository = $repository;
    }
}
