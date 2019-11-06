<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Client;

/**
 * Class ClientTransformer.
 *
 * @package namespace App\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{
    /**
     * Transform the Client entity.
     *
     * @param \App\Entities\Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id'                => (int) $model->id,
            'phoneNumber'       => $model->phoneNumber,
            'nome'              => $model->nome,
            'email'             => $model->email,
            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }
}
