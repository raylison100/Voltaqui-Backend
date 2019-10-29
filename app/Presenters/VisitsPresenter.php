<?php

namespace App\Presenters;

use App\Transformers\VisitsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VisitsPresenter.
 *
 * @package namespace App\Presenters;
 */
class VisitsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VisitsTransformer();
    }
}
