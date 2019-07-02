@extends('layouts/front-page')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                LIBRARY
            </div>
            <div class="links">
                @auth
                    <a href="{{ route('home') }}">Books</a>

                    @if(!Auth::user()->isAdmin())
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
                <a href="https://github.com/godhandkiller/library" target="_blank">GitHub</a>
            </div>
        </div>
    </div>
@stop

