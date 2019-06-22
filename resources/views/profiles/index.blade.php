@extends('layouts.app')

@section('content')
<div class="mx-auto">

    <div class="flex md:flex-row-reverse flex-wrap">

        <div class="w-full md:w-3/4 bg-gray-300 p-4">
            <div class="flex">
                <img class="h-32 w-32 rounded-full mt-2" src="{{ $user->profile->url_path }}">

                <div class="flex-1 mx-3 py-3">
                    <h2 class="text-lg font-bold text-3xl text-gray-700">{{ $user->name }}</h2>
                    <div class="text-gray-600 italic mt-2">{{ '@'. $user->username }}</div>
                    <div class="text-gray-600 mt-2">{{ $user->profile->description }}</div>
                    <div class="text-gray-600 mt-2">{{ $user->profile->url }}</div>

                    <div class="flex text-gray-600 mt-8">
                        <div class="pr-2"><strong class="text-gray-700">{{ $postsCount }}</strong> posts</div>
                        <div class="pr-2"><strong class="text-gray-700">{{ $followersCount }}</strong>  followers</div>
                        <div class="pr-2"><strong class="text-gray-700">{{ $followingCount  }}</strong>  following</div>
                    </div>

                </div>

                <div class="flex-1">
                    {{--con esta validacion, el boton de editar no aparece en tu perfil--}}
                    @cannot('update', $user->profile)
                        <follow-component user-id="{{  $user->username }}" follows="{{ $follows }}"></follow-component>
                    @endcan
                </div>

            </div>

        </div>

        <div class="w-full md:w-1/4 bg-gray-400 p-4 text-center text-gray-700">
            <img class="h-24 w-24 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6" src="{{ $user->profile->url_path }}">
        </div>
    </div>



</div>

@endsection
