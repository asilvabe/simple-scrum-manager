@extends('layouts.site')
@push('toolbar')
    <a href="{{ route('developers.index') }}" class="button is-primary">
        <b-icon icon="arrow-left-thick"></b-icon>
        <span>@lang('Back')</span>
    </a>
@endpush
@push('site-content')
    <form action="{{ route('developers.store') }}" method="post">
        @include('developers.form')
        <b-button native-type="submit" label="@lang('Save')" type="is-primary" expanded></b-button>
    </form>
@endpush
