<h2 class="title">@lang('Sprints')</h2>
@if($sprints->count())
<div class="table-container">
    <table class="table is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
        <tr>
            <th>@lang('Name')</th>
            <th>@lang('Story Points assigned')</th>
            <th>@lang('Story Points consumed')</th>
            <th>@lang('Compliance')</th>
            <th>@lang('Starts at')</th>
            <th>@lang('Ends at')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sprints as $sprint)
            <tr>
                <td>
                    {{ $sprint->name }}
                    @if($sprint->isCompleted())
                        <span class="tag is-success is-pulled-right">@lang('Completed')</span>
                    @endif
                </td>
                <td>{{ $sprint->storyPointsAssigned() }}</td>
                <td>{{ $sprint->storyPointsConsumed() }}</td>
                <td>
                    <span class="tag is-info is-light">{{ $sprint->compliance() }}%</span>
                </td>
                <td>{{ $sprint->starts_at->toDateString() }}</td>
                <td>{{ $sprint->ends_at->toDateString() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    @include('partials.messages.empty', ['message' => trans('No sprints were found')])
    <a href="#" class="button is-primary is-fullwidth">@lang('Create a sprint')</a>
@endif
