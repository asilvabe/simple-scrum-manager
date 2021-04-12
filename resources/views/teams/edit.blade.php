@extends('layouts.site')
@push('site-content')
    <div class="box">
        <form action="{{ route('teams.update', $team) }}" method="post">
            @method('PATCH')
            @include('teams.form')
            <b-button native-type="submit" label="@lang('common.update')" type="is-primary" expanded></b-button>
        </form>
    </div>
    @include('partials.forms.delete')
@endpush
