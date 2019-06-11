<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getUrlPathAttribute()
    {
        $imagePath = ($this->image) ? Storage::url($this->image) : '/placeholders/placeholder_user.png';
        return $imagePath;
    }


}

