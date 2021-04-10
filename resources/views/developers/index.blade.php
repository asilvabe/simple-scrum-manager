@extends('layouts.site')
@push('site-content')
    @if($developers->count())
    <div class="table-container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
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
                        <div class="buttons is-right">
                            <a href="{{ route('developers.show', $developer) }}" class="button is-small is-primary">
                                <b-icon size="is-small" icon="eye"></b-icon>
                            </a>
                            <a href="{{ route('developers.edit', $developer) }}" class="button is-small is-warning">
                                <b-icon size="is-small" icon="pencil"></b-icon>
                            </a>
                            @include('partials.buttons.destroy', ['route' => route('developers.destroy', $developer), 'size' => 'is-small', 'text' => ''])
                        </div>
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
@endpush
@push('site-content-bottom')
    <delete-form-component>
        @csrf
        @method('DELETE')
    </delete-form-component>
@endpush
