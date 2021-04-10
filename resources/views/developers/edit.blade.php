@extends('layouts.site')
@push('site-content')
    <form action="{{ route('developers.update', $developer) }}" method="post">
        @method('PATCH')
        @include('developers.form')
        <b-button native-type="submit" label="@lang('Update')" type="is-primary" expanded></b-button>
    </form>
@endpush
