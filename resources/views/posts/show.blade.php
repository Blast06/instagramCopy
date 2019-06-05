@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100"
                                 style="max-width: 40px;">
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{ $post->user->username }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <p><span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->username }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                    </span> {{ $post->caption }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
