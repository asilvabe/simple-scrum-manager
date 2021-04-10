@csrf
<div class="columns">
    <div class="column">
        <b-field
            label="@lang('Name')"
            type="{{ $errors->has('name') ? 'is-danger' : '' }}"
            message="{{ $errors->first('name') }}">
            <b-input
                name="name"
                value="{{ old('name', $team->name) }}"
                required
            ></b-input>
        </b-field>
    </div>
    <div class="column">
        <b-field
            label="@lang('Scrum master')"
            type="{{ $errors->has('scrum-master') ? 'is-danger' : '' }}"
            message="{{ $errors->first('scrum-master') }}">
            <b-select
                name="scrum-master"
                placeholder="@lang('Select an option')"
                value="{{ old('scrum-master', $team->scrum_master_id) }}"
                expanded
                required>
                <option
                    v-for="scrumMaster in {{ $scrumMasters->toJson() }}"
                    :value="scrumMaster.id"
                    :key="scrumMaster.id">
                    @{{ scrumMaster.name }}
                </option>
            </b-select>
        </b-field>
    </div>
</div>
