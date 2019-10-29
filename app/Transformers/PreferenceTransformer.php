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
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
