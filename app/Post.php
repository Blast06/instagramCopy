<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];

    //Los posts pertenecen a UN SOLO usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
