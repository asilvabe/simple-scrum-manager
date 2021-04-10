@csrf
<div class="columns">
    <div class="column">
        <b-field label="@lang('developers.fields.name')">
            <b-input
                name="name"
                value="{{ old('name', $developer->name) }}"
                type="{{ $errors->has('name') ? 'is-danger' : '' }}"
                message="{{ $errors->first('name') }}"
                required
            ></b-input>
        </b-field>
    </div>
    <div class="column">
        <b-field label="@lang('developers.fields.email')">
            <b-input
                name="name"
                value="{{ old('name', $developer->email) }}"
                type="{{ $errors->has('email') ? 'is-danger' : '' }}"
                message="{{ $errors->first('email') }}"
                required
            ></b-input>
        </b-field>
    </div>
    <div class="column">
        <b-field label="@lang('developers.fields.level')">
            <b-select
                name="scrum-master"
                type="{{ $errors->has('level') ? 'is-danger' : '' }}"
                message="{{ $errors->first('level') }}"
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
