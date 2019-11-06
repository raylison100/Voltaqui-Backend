<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Assessment;

/**
 * Class AssessmentsTransformer.
 *
 * @package namespace App\Transformers;
 */
class AssessmentsTransformer extends TransformerAbstract
{
    /**
     * Transform the Assessment entity.
     *
     * @param \App\Entities\Assessment $model
     *
     * @return array
     */
    public function transform(Assessment $model)
    {
        return [
            'id'                => (int) $model->id,
            'note'              => $model->note,
            'restaurant_id'     => $model->restaurant_id,
            'client_id'         => $model->client_id,
            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }
}
