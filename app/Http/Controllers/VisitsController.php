<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VisitsCreateRequest;
use App\Http\Requests\VisitsUpdateRequest;
use App\Repositories\VisitsRepository;
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
