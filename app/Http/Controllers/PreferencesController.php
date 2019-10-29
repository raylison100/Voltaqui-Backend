<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;

use App\Services\PreferenceService;
use App\Validators\PreferenceValidator;

/**
 * Class PreferencesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PreferencesController extends Controller
{
    use CrudMethods;

    protected $service;
    protected $validator;

    public function __construct(PreferenceService $service, PreferenceValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
