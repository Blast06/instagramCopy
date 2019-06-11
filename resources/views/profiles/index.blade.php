@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  mr-5">
        <div class="col-3 p-5">


            <img src="{{ $user->profile->url_path }}"
                 alt="profile_pic" class="rounded-circle w-100">


        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
               <div class="d-flex align-items-center pb-3">
                   <div class="h4">{{ $user->username }}</div>

                   {{--con esta validacion, el boton de editar no aparece en tu perfil--}}
                    @cannot('update', $user->profile)
                    <follow-component user-id="{{  $user->username }}" follows="{{ $follows }}"></follow-component>
                    @endcan
               </div>
                <a class="btn btn-primary" href="/p/create">Add new Post</a>
            </div>


            <div class="d-flex">

                @can('update', $user->profile)
                    <a class="btn btn-primary" href="/profile/{{ $user->username }}/edit">Edit profile</a>
                @endcan

                <div class="pr-3"><strong>{{ $user->posts->count() }} </strong>posts</div>
                <div class="pr-3"><strong>40k </strong>followers</div>
                <div class="pr-3"><strong>200 </strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">

        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id  }}">
                <img class="w-100 h-75" src="/storage/{{ $post->image }}">
            </a>

        </div>
        @endforeach

    </div>

</div>
@endsection
