<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

//    protected $fillable = ['title','description','image','url'];
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

