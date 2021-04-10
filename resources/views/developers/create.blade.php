@extends('layouts.site')
@push('site-content')
    <form action="{{ route('developers.store') }}" method="post">
        @include('developers.form')
        <b-button native-type="submit" label="@lang('Save')" type="is-primary" expanded></b-button>
    </form>
@endpush
