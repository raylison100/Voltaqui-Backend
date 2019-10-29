<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;

use App\Repositories\PreferenceRepository;

class PreferenceService
{
    use CrudMethods;

    protected $repository;

    public function __construct(PreferenceRepository $repository)
    {
        $this->repository = $repository;
    }
}
