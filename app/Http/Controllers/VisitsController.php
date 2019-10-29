<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;

use App\Services\VisitService;
use App\Validators\VisitsValidator;

/**
 * Class VisitsController.
 *
 * @package namespace App\Http\Controllers;
 */
class VisitsController extends Controller
{
    use CrudMethods;

    protected $service;
    protected $validator;

    public function __construct(VisitService $service, VisitsValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
