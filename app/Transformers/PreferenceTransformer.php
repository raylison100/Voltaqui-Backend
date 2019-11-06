<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Preference;

/**
 * Class PreferenceTransformer.
 *
 * @package namespace App\Transformers;
 */
class PreferenceTransformer extends TransformerAbstract
{
    /**
     * Transform the Preference entity.
     *
     * @param \App\Entities\Preference $model
     *
     * @return array
     */
    public function transform(Preference $model)
    {
        return [
            'id'                => (int) $model->id,
            'client_id'         => $model->client_id,
            'restaurant_id'     => $model->restaurant_id,
            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }
}
