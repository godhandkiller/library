@extends('layouts/front-page')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                LIBRARY
            </div>

            <div class="links">
                @auth
                    <a href="#">Books</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
@stop

