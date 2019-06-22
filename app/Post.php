<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];
//    protected $dates = ['created_at', 'date_end'];
    protected $guarded = [];

    //Los posts pertenecen a UN SOLO usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
