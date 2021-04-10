@extends('layouts.app')
@inject('messages', 'App\Services\MessagesService')
@section('main')
    <div id="app">
        @include('main-navbar')
        @yield('content-top')
        @yield('content')
        @yield('content-bottom')
        @auth()
            <logout-component>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </logout-component>
        @endauth
        @if($messages->hasMessage())
            {!! $messages->notify() !!}
        @endif
        @if($errors->any())
            {!! $messages->notify(['type' => 'danger', 'content' => trans('common.messages.validation.error')]) !!}
        @endif
    </div>
@endsection
@section('footer')
    @stack('footer-top')
    <footer class="footer">
        <div class="content has-text-centered">
            <a href="https://bulma.io" target="_blank">
                <img src="https://bulma.io/images/made-with-bulma.png" alt="Made with Bulma" width="128" height="24">
            </a>
        </div>
    </footer>
@endsection
