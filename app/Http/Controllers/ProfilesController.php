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
        $this->middleware('auth', ['except' => ['index']]);
    }


    public function index(User $user)
    {
        // si el usuario esta logueado, manda si contiene el usuario mostrado en el perfil
        // de lo contrario, manda false
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

//        dd($follows);
        return view('profiles.index', compact("user", 'follows'));
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
            $image = UploadFileHelper::uploadFile('image','profilepic', 1000, 1000);
            $imageArr = [ 'image' => $image];
        }

        auth()->user()->profile()->update(array_merge(
            $request->validated(),
            $imageArr ?? []

        ));

        return redirect("/profile/{$request->user()->username}");
    }
}
