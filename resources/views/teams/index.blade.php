@extends('layouts.site')
@push('toolbar')
    <a href="#" class="button is-primary">
        <b-icon icon="plus"></b-icon>
        <span>@lang('Create')</span>
    </a>
@endpush
@push('site-content')
    <div class="table-container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Scrum Master')</th>
                <th>@lang('Developers')</th>
                <th>@lang('Sprints')</th>
                <th>@lang('Created at')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td><a href="{{ route('teams.show', $team) }}">{{ $team->name }}</a></td>
                    <td>{{ $team->scrumMaster->name}}</td>
                    <td>{{ $team->developers()->count() }}</td>
                    <td>{{ $team->sprints()->count() }}</td>
                    <td>{{ $team->created_at->toDateString() }}</td>
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
@endpush
