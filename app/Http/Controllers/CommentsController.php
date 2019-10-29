<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;

use App\Services\CommentService;
use App\Validators\CommentsValidator;

/**
 * Class CommentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CommentsController extends Controller
{
    use CrudMethods;

    protected $service;
    protected $validator;


    public function __construct(CommentService $service, CommentsValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }

}
