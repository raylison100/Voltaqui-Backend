<?php

namespace App\Presenters;

use App\Transformers\CatalogsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CatalogsPresenter.
 *
 * @package namespace App\Presenters;
 */
class CatalogsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CatalogsTransformer();
    }
}
