<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Assessment.
 *
 * @package namespace App\Entities;
 */
class Assessment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'note', 'restaurant_id', 'client_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
