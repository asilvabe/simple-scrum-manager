@extends('layouts.main')
@section('content-top')
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">{{ $texts['title'] }}</h1>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <div class="buttons">
                    @foreach($buttons as $template => $button)
                        @include("partials.buttons.{$template}", $button)
                    @endforeach
                    @stack('toolbar')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @stack('site-content')
@endsection
@section('content-bottom')
    @stack('site-content-bottom')
@endsection
