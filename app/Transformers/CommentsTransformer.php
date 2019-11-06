<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Comment;

/**
 * Class CommentsTransformer.
 *
 * @package namespace App\Transformers;
 */
class CommentsTransformer extends TransformerAbstract
{
    /**
     * Transform the Comment entity.
     *
     * @param \App\Entities\Comment $model
     *
     * @return array
     */
    public function transform(Comment $model)
    {
        return [
            'id'                => (int) $model->id,
            'assessment_id'     => $model->assessment_id,
            'message'           => $model->message,
            'restaurant_id'     => $model->restaurant_id,
            'client_id'         => $model->client_id,
            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }
}
