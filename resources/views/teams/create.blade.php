@extends('layouts.site')
@push('toolbar')
    <a href="{{ route('teams.index') }}" class="button is-primary">
        <b-icon icon="arrow-left-thick"></b-icon>
        <span>@lang('Back')</span>
    </a>
@endpush
@push('site-content')
    <form action="{{ route('teams.store') }}" method="post">
        @include('teams.form')
        <b-button native-type="submit" label="@lang('Save')" type="is-primary" expanded></b-button>
    </form>
@endpush
