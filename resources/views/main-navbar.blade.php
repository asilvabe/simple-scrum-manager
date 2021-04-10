<template>
    <b-navbar>
        <template #start>
            <b-navbar-item href="{{ url('') }}">
                Home
            </b-navbar-item>
        </template>
        <template #end>
            @stack('main-navbar-end')
            @auth()
                <b-navbar-dropdown label="{{ auth()->user()->email }}" boxed collapsible>
                    <b-navbar-item @click="$emit('auth:logout')">
                        @lang('Logout')
                    </b-navbar-item>
                </b-navbar-dropdown>
            @endauth
        </template>
    </b-navbar>
</template>
