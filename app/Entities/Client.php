<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Client.
 *
 * @package namespace App\Entities;
 */
class Client extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'phoneNumber', 'name', 'email'
    ];

    protected $dates = ['created_at', 'updated_at','deleted_at'];

    public function preferences()
    {
        return $this->hasMany(Preference::class);
    }

    public function fidelity()
    {
        return $this->hasOne(Fidelity::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function asseessments()
    {
        return $this->hasMany(Assessment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
