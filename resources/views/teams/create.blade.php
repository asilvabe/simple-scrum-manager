@extends('layouts.site')
@push('site-content')
    <div class="box">
        <form action="{{ route('teams.store') }}" method="post">
            @include('teams.form')
            <b-button native-type="submit" label="@lang('common.save')" type="is-primary" expanded></b-button>
        </form>
    </div>
@endpush
