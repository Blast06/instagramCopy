<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFileHelper;
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

        // Helper queguarda la imaen(en este caso en el storage de la app), le retorna el
        // path para despues agregarlo a la bd en su campo 'image'
         $imagePath = UploadFileHelper::uploadFile('image', 'uploads', 1200, 1200);

        //crea el post
        auth()->user()->posts()->create([
            'caption' => $request['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'. auth()->user()->username);


    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


}
