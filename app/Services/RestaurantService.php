<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;

use App\Repositories\RestaurantRepository;

class RestaurantService
{
    use CrudMethods;

    protected $repository;

    public function __construct(RestaurantRepository $repository)
    {
        $this->repository = $repository;
    }
}
