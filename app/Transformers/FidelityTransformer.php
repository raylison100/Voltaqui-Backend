<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Fidelity;

/**
 * Class FidelityTransformer.
 *
 * @package namespace App\Transformers;
 */
class FidelityTransformer extends TransformerAbstract
{
    /**
     * Transform the Fidelity entity.
     *
     * @param \App\Entities\Fidelity $model
     *
     * @return array
     */
    public function transform(Fidelity $model)
    {
        return [
            'id'            => (int) $model->id,
            'client_id'     => $model->client_id,
            'num_visits'    => $model->num_visits,
            'win'           => $model->win,
            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at
        ];
    }
}
