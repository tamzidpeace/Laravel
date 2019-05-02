<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // reverse process
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
