@extends('layouts.app')

@section('content')
    <div>

        @foreach( $posts as $post)
            @include('partials._card_post')
        @endforeach


        <div>
            {{ $posts->links() }}
        </div>


    </div>
@endsection
