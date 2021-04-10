@extends('layouts.site')
@push('toolbar')
    <a href="#" class="button is-primary">
        <b-icon icon="plus"></b-icon>
        <span>@lang('Create')</span>
    </a>
@endpush
@push('site-content')
    @if($teams->count())
    <div class="table-container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Scrum Master')</th>
                <th>@lang('Developers')</th>
                <th>@lang('Stats')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td><a href="{{ route('teams.show', $team) }}">{{ $team->name }}</a></td>
                    <td>{{ $team->scrumMaster->name}}</td>
                    <td>{{ $team->developers()->count() }}</td>
                    <td>
                        <div class="field is-grouped is-grouped-multiline">
                            @include('partials.tags.sprints', ['count' => $team->sprintsCount()])
                            @include('partials.tags.sp-assigned', ['count' => $team->storyPointsAssigned()])
                            @include('partials.tags.sp-consumed', ['count' => $team->storyPointsConsumed()])
                        </div>
                    </td>
                    <td>
                        <div class="buttons is-right">
                            <a href="{{ route('teams.show', $team) }}" class="button is-small is-primary" type="button">
                                <b-icon icon="eye"></b-icon>
                            </a>
                            <button class="button is-small is-danger" type="button">
                                <b-icon icon="trash-can"></b-icon>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        @include('partials.messages.empty', ['message' => trans('No teams were found')])
        <a href="#" class="button is-primary is-fullwidth">@lang('Create a team')</a>
    @endif
@endpush
