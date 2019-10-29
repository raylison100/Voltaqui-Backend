<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CatalogsRepository;
use App\Entities\Catalog;
use App\Validators\CatalogsValidator;

/**
 * Class CatalogsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CatalogsRepositoryEloquent extends BaseRepository implements CatalogsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Catalog::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CatalogsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
