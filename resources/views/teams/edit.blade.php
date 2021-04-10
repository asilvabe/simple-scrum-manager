@extends('layouts.site')
@push('site-content')
    <form action="{{ route('teams.update', $team) }}" method="post">
        @method('PATCH')
        @include('teams.form')
        <b-button native-type="submit" label="@lang('Update')" type="is-primary" expanded></b-button>
    </form>
@endpush
