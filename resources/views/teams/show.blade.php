@extends('layouts.site')
@push('site-content')
    <div class="box">
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
    </div>
@endpush
@push('site-content-bottom')
    @include('teams.show.developers')
    <hr>
    <div class="box">
        @include('teams.show.sprints')
    </div>
    @include('partials.forms.delete')
@endpush
