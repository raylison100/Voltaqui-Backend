<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Fidelity.
 *
 * @package namespace App\Entities;
 */
class Fidelity extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'client_id', 'num_visits', 'win'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
