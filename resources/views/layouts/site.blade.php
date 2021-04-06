@extends('layouts.main')
@section('content-top')
    <section class="hero is-small is-primary">
        <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-item"><h1 class="title">{{ $title }}</h1></div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <div class="buttons is-right">
                            @stack('toolbar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section class="section">
        @stack('site-content')
    </section>
@endsection
@section('content-bottom')
    <section class="section">
        @stack('site-content-bottom')
    </section>
@endsection
