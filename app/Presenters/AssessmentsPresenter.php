<?php

namespace App\Presenters;

use App\Transformers\AssessmentsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AssessmentsPresenter.
 *
 * @package namespace App\Presenters;
 */
class AssessmentsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AssessmentsTransformer();
    }
}
