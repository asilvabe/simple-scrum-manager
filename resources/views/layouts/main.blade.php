@extends('layouts.app')
@inject('messages', 'App\Services\MessagesService')
@section('main')
    <div id="app">
        @include('main-navbar')
        <section class="section has-background-light">
            @yield('content-top')
            @yield('content')
            @yield('content-bottom')
        </section>
        @auth()
            <logout-component>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </logout-component>
        @endauth
        <notification-component></notification-component>

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
@endsection
