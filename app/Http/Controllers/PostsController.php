<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // Activa el middleware en todo el controlador
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    { //{}
        return view('posts.create');
    }

    public function store(AddPostRequest $request)
    {

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        //crea el post
        auth()->user()->posts()->create([
            'caption' => $request['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'. auth()->user()->id);


    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


}
