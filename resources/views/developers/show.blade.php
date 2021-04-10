@extends('layouts.site')
@push('site-content')
    <div class="columns">
        <div class="column">
            <div class="icon-text">
                <b-icon icon="email"></b-icon>
                <span>@lang('developers.fields.email')</span>
            </div>
            <p class="block">
                {{ $developer->email }}
            </p>
        </div>
        <div class="column">
            <div class="icon-text">
                <b-icon icon="star"></b-icon>
                <span>@lang('developers.fields.level')</span>
            </div>
            <p class="block">
                <span class="tag is-info is-uppercase">{{ $developer->level}}</span>
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
                {{ $developer->created_at->toDateString() }}
            </p>
        </div>

        <div class="column">
            <div class="icon-text">
                <b-icon icon="calendar-edit"></b-icon>
                <span>@lang('Updated at')</span>
            </div>
            <p class="block">
                {{ $developer->updated_at->toDateString() }}
            </p>
        </div>
    </div>
@endpush
@push('site-content-bottom')
    <delete-form-component>
        @csrf
        @method('DELETE')
    </delete-form-component>
@endpush
