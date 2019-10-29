<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;

use App\Repositories\AssessmentsRepository;

class AssessmentService
{
    use CrudMethods;

    protected $repository;

    public function __construct(AssessmentsRepository $repository)
    {
        $this->repository = $repository;
    }
}
