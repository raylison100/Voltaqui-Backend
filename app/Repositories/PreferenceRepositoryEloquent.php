<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PreferenceRepository;
use App\Entities\Preference;
use App\Validators\PreferenceValidator;

/**
 * Class PreferenceRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PreferenceRepositoryEloquent extends BaseRepository implements PreferenceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Preference::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PreferenceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
