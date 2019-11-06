<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Catalog;

/**
 * Class CatalogsTransformer.
 *
 * @package namespace App\Transformers;
 */
class CatalogsTransformer extends TransformerAbstract
{
    /**
     * Transform the Catalog entity.
     *
     * @param \App\Entities\Catalog $model
     *
     * @return array
     */
    public function transform(Catalog $model)
    {
        return [
            'id'                => (int) $model->id,
            'restaurant_id'     => $model->restaurant_id,
            'image'             => $model->image,
            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }
}
