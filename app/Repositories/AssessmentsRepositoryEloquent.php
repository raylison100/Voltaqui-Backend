<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AssessmentsRepository;
use App\Entities\Assessment;
use App\Validators\AssessmentsValidator;

/**
 * Class AssessmentsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AssessmentsRepositoryEloquent extends BaseRepository implements AssessmentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Assessment::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AssessmentsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
