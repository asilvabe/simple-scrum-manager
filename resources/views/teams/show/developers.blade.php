<h2 class="title">@lang('Developers')</h2>
@if($developers->count())
<div class="table-container">
    <table class="table is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
        <tr>
            <th>@lang('Level')</th>
            <th>@lang('Name')</th>
            <th>@lang('Email')</th>
            <th>@lang('Velocity')</th>
            <th>@lang('Compliance')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($developers as $developer)
            <tr>
                <td>
                    <span class="tag is-info is-uppercase">{{ $developer->level}}</span>
                </td>
                <td>
                    {{ $developer->name }}
                    <div class="field is-grouped is-grouped-multiline">
                        @include('partials.tags.sprints', ['count' => $developer->sprintsCount()])
                        @include('partials.tags.sp-assigned', ['count' => $developer->storyPointsAssigned()])
                        @include('partials.tags.sp-consumed', ['count' => $developer->storyPointsConsumed()])
                    </div>
                </td>
                <td>{{ $developer->email}}</td>
                <td>{{ $developer->velocity() }}</td>
                <td>
                    <span class="tag is-info is-light">{{ $developer->compliance() }}%</span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    @include('partials.messages.empty', ['message' => trans('No developers were found')])
    <a href="#" class="button is-primary is-fullwidth">@lang('Create a developer')</a>
@endif
