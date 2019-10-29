<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RestaurantCreateRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Repositories\RestaurantRepository;
use App\Validators\RestaurantValidator;

/**
 * Class RestaurantsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RestaurantsController extends Controller
{
    use CrudMethods;

    protected $service;
    protected $validator;

    public function __construct(RestaurantService $service, RestaurantValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
