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
                <b-icon icon="calendar-clock"></b-icon>
                <span>@lang('Updated at')</span>
            </div>
            <p class="block">
                {{ $team->updated_at->toDateString() }}
            </p>
        </div>
    </div>
@endpush
@push('site-content-bottom')
    <h2 class="title">@lang('Developers')</h2>
    <div class="table-container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
            <tr>
                <th>@lang('Level')</th>
                <th>@lang('Name')</th>
                <th>@lang('Email')</th>
                <th>@lang('Sprints')</th>
                <th>@lang('SP assigned')</th>
                <th>@lang('SP consumed')</th>
                <th>@lang('Velocity')</th>
                <th>@lang('Compliance')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($developers as $developer)
                <tr>
                    <td>
                        <span class="tag is-info is-uppercase">{{ $developer->pivot->level}}</span>
                    </td>
                    <td>{{ $developer->name }}</td>
                    <td>{{ $developer->email}}</td>
                    <td>{{ $developer->sprintsCount() }}</td>
                    <td>{{ $developer->historyPointsAssigned() }}</td>
                    <td>{{ $developer->historyPointsConsumed() }}</td>
                    <td>{{ $developer->velocity() ?? '--' }}</td>
                    <td>
                        <progress max="100" class="progress is-small is-primary" value="{{ $developer->compliance() ?? 0 }}">
                            {{ $developer->compliance() ?? 0 }}%
                        </progress>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endpush
