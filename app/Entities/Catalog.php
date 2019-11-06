<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Catalog.
 *
 * @package namespace App\Entities;
 */
class Catalog extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'restaurant_id', 'image'];

    protected $dates = ['created_at', 'updated_at'];

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
