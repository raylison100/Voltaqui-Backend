<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Visit.
 *
 * @package namespace App\Entities;
 */
class Visit extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'client_id', 'restaurant_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
