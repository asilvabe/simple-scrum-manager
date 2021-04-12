@extends('layouts.site')
@push('site-content')
    <div class="box">
        @if($developers->count())
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>@lang('developers.fields.name')</th>
                        <th>@lang('developers.fields.email')</th>
                        <th>@lang('developers.fields.level')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($developers as $developer)
                        <tr>
                            <td><a href="{{ route('developers.show', $developer) }}">{{ $developer->name }}</a></td>
                            <td>{{ $developer->email}}</td>
                            <td><span class="tag is-info is-uppercase">{{ $developer->level}}</span></td>
                            <td>
                                @include('partials.index.actions', ['module' => 'developers', 'model' => $developer])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            @include('partials.messages.empty', ['message' => trans('developers.messages.empty')])
            <a href="{{ $buttons['create']['route'] }}" class="button is-primary is-fullwidth">
                {{ $buttons['create']['text'] }}
            </a>
        @endif
    </div>
    @include('partials.forms.delete')
@endpush
