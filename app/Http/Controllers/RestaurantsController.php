<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;

use App\Services\RestaurantService;
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
