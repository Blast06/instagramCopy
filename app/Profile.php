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

    // muestra la imagen de perfil o imagen por defecto
    public function getUrlPathAttribute()
    {
        // con esto, si hay imagen, manda la imagen, de lo contrario, manda el placeholder.
        $imagePath = ($this->image) ? Storage::url($this->image) : '/placeholders/placeholder_user.png';
        return $imagePath;
    }


}

