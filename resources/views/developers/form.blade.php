@csrf
<div class="columns">
    <div class="column">
        <b-field
            label="@lang('developers.fields.name')"
            type="{{ $errors->has('name') ? 'is-danger' : '' }}"
            message="{{ $errors->first('name') }}"
        >
            <b-input
                name="name"
                value="{{ old('name', $developer->name) }}"
                required
            ></b-input>
        </b-field>
    </div>
    <div class="column">
        <b-field
            label="@lang('developers.fields.email')"
            type="{{ $errors->has('email') ? 'is-danger' : '' }}"
            message="{{ $errors->first('email') }}"
        >
            <b-input
                name="name"
                value="{{ old('name', $developer->email) }}"
                required
            ></b-input>
        </b-field>
    </div>
    <div class="column">
        <b-field
            label="@lang('developers.fields.level')"
            type="{{ $errors->has('level') ? 'is-danger' : '' }}"
            message="{{ $errors->first('level') }}"
        >
            <b-select
                name="scrum-master"
                placeholder="@lang('Select an option')"
                value="{{ $developer->level }}"
                expanded
                required>
                <option
                    v-for="level in {{ json_encode($levels) }}"
                    :value="level"
                    :key="level">
                    @{{ level }}
                </option>
            </b-select>
        </b-field>
    </div>
</div>
