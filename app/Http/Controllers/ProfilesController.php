<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFileHelper;
use App\Http\Requests\UpdateProfileRequest;
use App\Profile;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Helper\Helper;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(User $user)
    {


        return view('profiles.index', compact("user"));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {

//        authorizing to update
        $this->authorize('update', $request->user()->profile);

        if ($request->has('image')){

            // TODO: REFACTOR PROCESS OF UPLOADING AND RESIZING IMAGE HERE AND AND POSTSCONTROLLER

            //primero subo la imagen , despues con intervention le hago un fit
            //para que asi despues  pueda aplicar el efecto rounded circle, luego
            // la agrego al array merge para el update.
            $imagePath = request('image')->store('profilepic', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();


            $image = $imagePath;
            $imageArr = [ 'image' => $image];

        }

        auth()->user()->profile()->update(array_merge(
            $request->validated(),
            $imageArr ?? []
        ));

        return redirect("/profile/{$request->user()->username}");

    }
}
