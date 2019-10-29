<?php

namespace App\Presenters;

use App\Transformers\PreferenceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PreferencePresenter.
 *
 * @package namespace App\Presenters;
 */
class PreferencePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PreferenceTransformer();
    }
}
