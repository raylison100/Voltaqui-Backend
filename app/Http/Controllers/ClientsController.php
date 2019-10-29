<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;

use App\Validators\ClientValidator;

/**
 * Class ClientsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ClientsController extends Controller
{
    use CrudMethods;

    protected $service;
    protected $validator;

    public function __construct(ClientService $service, ClientValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
