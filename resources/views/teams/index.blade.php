@extends('layouts.site')
@push('site-content')
    <div class="box">
        @if($teams->count())
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>@lang('teams.fields.name')</th>
                        <th>@lang('teams.fields.scrum-master')</th>
                        <th>@lang('teams.fields.developers')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>
                                <a href="{{ route('teams.show', $team) }}">{{ $team->name }}</a>
                                <div class="field is-grouped is-grouped-multiline">
                                    @include('partials.tags.sprints', ['count' => $team->sprintsCount()])
                                    @include('partials.tags.sp-assigned', ['count' => $team->storyPointsAssigned()])
                                    @include('partials.tags.sp-consumed', ['count' => $team->storyPointsConsumed()])
                                </div>
                            </td>
                            <td>{{ $team->scrumMaster->name}}</td>
                            <td>{{ $team->developers()->count() }}</td>
                            <td>
                                @include('partials.index.actions', ['module' => 'teams', 'model' => $team])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            @include('partials.messages.empty', ['message' => trans('No teams were found')])
            <a href="{{ $buttons['create']['route'] }}" class="button is-primary is-fullwidth">@lang('Create a team')</a>
        @endif
    </div>
    @include('partials.forms.delete')
@endpush
