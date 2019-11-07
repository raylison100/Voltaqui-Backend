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
        'id', 'name', 'email', 'partner', 'note', 'deleted_at', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = ['created_at', 'updated_at','deleted_at'];

    public function preferences()
    {
        return $this->hasMany(Preference::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function Catalogs()
    {
        return $this->hasMany(Catalog::class);
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
