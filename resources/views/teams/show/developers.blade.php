<x-box>
    <x-slot name="left">
        <h2 class="title">@lang('Developers')</h2>
    </x-slot>
    <x-slot name="right">
        <div class="buttons">
            <button type="button" class="button" @click="$emit('developer-team:create')" title="@lang('common.add')">
                <b-icon icon="plus"></b-icon>
                <span>@lang('common.add')</span>
            </button>
            <button type="button" class="button" @click="$emit('developer-team:refresh')"
                    title="@lang('common.refresh')">
                <b-icon icon="refresh"></b-icon>
            </button>
        </div>
    </x-slot>
    @if($team->developers_count > 0)
        <developer-team-index route="{{ route('api.developer-teams.index', ['team' => $team->id]) }}">
            <b-table-column
                label="@lang('Level')"
                width="20"
                v-slot="developers">
            <span class="tag is-info is-uppercase">
                @{{ developers.row.level }}
            </span>
            </b-table-column>
            <b-table-column
                label="@lang('Name')"
                width="auto"
                v-slot="developers">
                @{{ developers.row.name }}
            </b-table-column>
            <b-table-column
                label="@lang('Email')"
                width="auto"
                v-slot="developers">
                @{{ developers.row.email }}
            </b-table-column>
            <b-table-column
                label="@lang('Sprints')"
                width="20"
                v-slot="developers"
                centered>
                <div style="width: 100%" class="tag is-info is-light" v-text="developers.row.sprints_count"></div>
            </b-table-column>
            <b-table-column
                label="@lang('Assigned')"
                width="20"
                v-slot="developers"
                centered>
                <div style="width: 100%" class="tag is-info is-light" v-text="developers.row.sp_assigned"></div>
            </b-table-column>
            <b-table-column
                label="@lang('Consumed')"
                width="20"
                v-slot="developers"
                centered>
                <div style="width: 100%" class="tag is-info is-light" v-text="developers.row.sp_consumed"></div>
            </b-table-column>
            <b-table-column
                label="@lang('Velocity')"
                width="20"
                v-slot="developers"
                centered>
                <div style="width: 100%" class="tag is-info is-light" v-text="developers.row.velocity"></div>
            </b-table-column>
            <b-table-column
                label="@lang('Compliance')"
                width="20"
                v-slot="developers"
                centered>
                <div style="width: 100%" class="tag is-info is-light" v-text="developers.row.compliance"></div>
            </b-table-column>
            <b-table-column
                label="&#8230;"
                width="auto"
                v-slot="developers"
                centered>
                <div class="buttons is-centered are-small">
                    <b-button @click="$emit('developer-team:delete', developers.row.id)">
                        <b-icon icon="delete" class="has-text-danger"></b-icon>
                    </b-button>
                </div>
            </b-table-column>

            <template #empty>
                @include('partials.messages.empty', ['message' => trans('No developers were found')])
            </template>

        </developer-team-index>
    @else
        @include('partials.messages.empty', ['message' => trans('No developers were found')])
    @endif
</x-box>
<developer-team-create
    label="@lang('teams.assign_developer')"
    cancel-text="@lang('common.cancel')"
    save-text="@lang('common.save')"
    :team="{{ $team->id }}"></developer-team-create>

<developer-team-delete :team="{{ $team->id }}"></developer-team-delete>
