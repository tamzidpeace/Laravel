<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    //protected $table = 'posts';

    use SoftDeletes;
    public $directory = "/images/";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'body',
        'path'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function photos() {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function getPathAttribute($value) {
        return $this->directory . $value;
    }
}
