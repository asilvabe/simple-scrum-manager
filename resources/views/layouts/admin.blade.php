@extends('layouts.main')
@section('content-top')
    <div class="container">
        @include('main-navbar')
        @yield('admin-content-top')
    </div>
@endsection
@section('content')
    <div class="box container mt-3">
        @yield('admin-content')
    </div>
@endsection
@section('content-bottom')
    <div class="container">
        @yield('admin-content-bottom')
    </div>
@endsection
@push('scripts-top')
@endpush
