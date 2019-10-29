<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Validators\AssessmentsValidator;


/**
 * Class AssessmentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AssessmentsController extends Controller
{
    use CrudMethods;

    protected $service;
    protected $validator;

    public function __construct(AssessmentService $service, AssessmentsValidator $validator)
    {
        $this->service = $service;
        $this->validator = $validator;
    }

}
