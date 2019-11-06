<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Restaurant.
 *
 * @package namespace App\Entities;
 */
class Restaurant extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'email', 'partner', 'note', 'deleted_at', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = ['created_at', 'updated_at','deleted_at'];
}
