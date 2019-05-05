<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post() {
        return $this->hasOne('App\Post');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function roles() {
        return $this->belongsToMany(Role::class)->withPivot('created_at'); // 'App\Role'
    }

    public function photos() {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function getNameAttribute($value) {
        return ucfirst($value);
    }

    /**
     * @param $value
     * Mutators
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

}
