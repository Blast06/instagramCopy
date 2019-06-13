<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFileHelper;
use App\Http\Requests\AddPostRequest;
use App\Post;
use App\User;
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

    // retornar la lista de posts  de usuarios que sigue el user autenticado y
    // mostrarlos en orden cronologico
    public function index()
    {
        // trae todos los users que estan en la tabla 'profiles' => profiles.user_id
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(2);



        return view('posts.index', compact('posts'));

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(AddPostRequest $request)
    {

        // Helper que guarda la imaen(en este caso en el storage de la app), le retorna el
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
