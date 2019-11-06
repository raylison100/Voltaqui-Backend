<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Comment.
 *
 * @package namespace App\Entities;
 */
class Comment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'assessment_id', 'message', 'restaurant_id', 'client_id'
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

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
