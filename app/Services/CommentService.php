<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;

use App\Repositories\CommentsRepository;

class CommentService
{
    use CrudMethods;

    protected $repository;

    public function __construct(CommentsRepository $repository)
    {
        $this->repository = $repository;
    }
}
