<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Visit;

/**
 * Class VisitsTransformer.
 *
 * @package namespace App\Transformers;
 */
class VisitsTransformer extends TransformerAbstract
{
    /**
     * Transform the Visit entity.
     *
     * @param \App\Entities\Visit $model
     *
     * @return array
     */
    public function transform(Visit $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
