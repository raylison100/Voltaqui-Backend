<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Validators\CatalogsValidator;

/**
 * Class CatalogsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CatalogsController extends Controller
{
    use CrudMethods;

    protected $service;
    protected $validator;

    public function __construct(CatalogService $service, CatalogsValidator $validator)
    {
        $this->service = $service;
        $this->validator = $validator;
    }

}
