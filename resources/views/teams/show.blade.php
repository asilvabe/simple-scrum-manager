@extends('layouts.site')
@push('toolbar')
    <a href="{{ route('teams.index') }}" class="button is-primary">
        <b-icon icon="arrow-left-thick"></b-icon>
        <span>@lang('Back')</span>
    </a>
@endpush
@push('site-content')
    <div class="columns">
        <div class="column">
            <div class="icon-text">
                <b-icon icon="account-star"></b-icon>
                <span>@lang('Scrum master')</span>
            </div>
            <p class="block">
                {{ $scrumMaster->name }}<br>
                {{ $scrumMaster->email }}
            </p>
        </div>
    </div>
    <hr>
    <div class="columns">
        <div class="column">
            <div class="icon-text">
                <b-icon icon="calendar-check"></b-icon>
                <span>@lang('Created at')</span>
            </div>
            <p class="block">
                {{ $team->created_at->toDateString() }}
            </p>
        </div>

        <div class="column">
            <div class="icon-text">
                <b-icon icon="calendar-edit"></b-icon>
                <span>@lang('Updated at')</span>
            </div>
            <p class="block">
                {{ $team->updated_at->toDateString() }}
            </p>
        </div>
    </div>
@endpush
@push('site-content-bottom')
    @include('teams.show.developers')
    @include('teams.show.sprints')
@endpush
