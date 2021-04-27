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
            <button type="button" class="button" @click="$emit('developer-team:refresh')" title="@lang('common.refresh')">
                <b-icon icon="refresh"></b-icon>
            </button>
        </div>
    </x-slot>
@if($team->developers_count > 0)
    <developer-team-index-component route="{{ route('api.developer-teams.index', ['team' => $team->id]) }}">
        <b-table-column field="level" label="@lang('Level')" width="20" v-slot="developers">
            <span class="tag is-info is-uppercase">@{{ developers.row.level }}</span>
        </b-table-column>
        <b-table-column field="name" label="@lang('Name')" width="auto" v-slot="developers">
            @{{ developers.row.name }}
        </b-table-column>
        <b-table-column field="email" label="@lang('Email')" width="auto" v-slot="developers">
            @{{ developers.row.email }}
        </b-table-column>
        <b-table-column field="sprints" label="@lang('Sprints')" width="20" v-slot="developers" centered>
            <div style="width: 100%" class="tag is-info is-light" v-if="developers.row.sprints_count">@{{ developers.row.sprints_count }}</div>
        </b-table-column>
        <b-table-column field="spAsigned" label="@lang('Assigned')" width="20" v-slot="developers" centered>
            <div style="width: 100%" class="tag is-info is-light" v-if="developers.row.sp_assigned">@{{ developers.row.sp_assigned }}</div>
        </b-table-column>
        <b-table-column field="spConsumed" label="@lang('Consumed')" width="20" v-slot="developers" centered>
            <div style="width: 100%" class="tag is-info is-light" v-if="developers.row.sp_consumed">@{{ developers.row.sp_consumed }}</div>
        </b-table-column>
        <b-table-column field="velocity" label="@lang('Velocity')" width="20" v-slot="developers" centered>
            <div style="width: 100%" class="tag is-info is-light" v-if="developers.row.velocity">@{{ developers.row.velocity }}</div>
        </b-table-column>
        <b-table-column field="compliance" label="@lang('Compliance')" width="20" v-slot="developers" centered>
            <div style="width: 100%" class="tag is-info is-light" v-if="developers.row.compliance">@{{ developers.row.compliance }}%</div>
        </b-table-column>
        <b-table-column field="actions" width="auto" v-slot="developers">
            <div class="buttons is-right">
                <a class="button is-primary is-inverted is-small">
                    <b-icon icon="eye-outline"></b-icon>
                </a>
                <button class="button is-inverted is-small is-danger" type="button" @click="$emit('developer-team:delete', developers.row.id)">
                    <b-icon icon="delete-outline"></b-icon>
                </button>
            </div>
        </b-table-column>
    </developer-team-index-component>
@else
    @include('partials.messages.empty', ['message' => trans('No developers were found')])
@endif
</x-box>
<developer-team-create-component
    label="@lang('teams.assign_developer')"
    cancel-text="@lang('common.cancel')"
    save-text="@lang('common.save')"
    :team="{{ $team->id }}"></developer-team-create-component>

<developer-team-delete-component :team="{{ $team->id }}"></developer-team-delete-component>
