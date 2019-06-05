<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relacion muchos a muchos de seguidores
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function profileImage()
    {
        return $this->image;
    }


}

