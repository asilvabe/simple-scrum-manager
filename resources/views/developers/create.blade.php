@extends('layouts.site')
@push('site-content')
    <div class="box">
        <form action="{{ route('developers.store') }}" method="post">
            @include('developers.form')
            <b-button native-type="submit" label="@lang('common.save')" type="is-primary" expanded></b-button>
        </form>
    </div>
@endpush
