<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;

use App\Validators\FidelityValidator;

/**
 * Class FidelitiesController.
 *
 * @package namespace App\Http\Controllers;
 */
class FidelitiesController extends Controller
{
    use CrudMethods;

    protected $service;
    protected $validator;

    public function __construct(FidelityService $service, FidelityValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
