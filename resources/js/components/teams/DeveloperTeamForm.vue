<template>
    <div class="box">
        <div class="block">
            <b-field :label="label" :type="this.errors ? 'is-danger' : ''" :message="this.errors ? this.errors.developer[0] : ''">
                <b-autocomplete
                    icon="magnify"
                    field="name"
                    v-model="name"
                    @typing="getAsyncDevelopers"
                    @select="option => (this.selected = option)"
                    :loading="isFetching"
                    :data="developers"
                    clearable
                    expanded>
                    <template #empty>No results for {{ name }}</template>
                    <template slot-scope="developers">
                        <p>{{ developers.option.name }}<br /><small>{{ developers.option.email }}</small></p>
                    </template>
                </b-autocomplete>
            </b-field>
        </div>
        <div class="block has-text-right">
            <b-button
                :label="cancelText"
                icon-left="close"
                @click="$emit('close')" />
            <b-button
                :label="saveText"
                :disabled="this.selected === null"
                @click="save"
                icon-left="content-save"
                type="is-primary" />
        </div>
    </div>
</template>
<script>
import {debounce} from "lodash";

export default {
    name: 'DeveloperTeamForm',
    data: () => ({
        developers: [],
        errors: null,
        selected: null,
        name: '',
        isFetching: false
    }),
    props: {
        team: {
            type: Number,
            required: true
        },
        label: {
            type: String,
            required: true
        },
        saveText: {
            type: String,
            required: true
        },
        cancelText: {
            type: String,
            required: true
        },
    },
    methods: {
        save() {
            axios.post('/api/developer-teams', { developer: this.selected.id, team: this.team})
                .then( () => this.close())
                .catch(error => {
                    this.errors = error.data.errors
                })
        },
        close() {
            this.$emit('close')
            this.$root.$emit('developer-team:stored')
        },
        notify(message) {
            this.$buefy.toast.open({
                message: message,
                type: 'is-success'
            })
        },
        getAsyncDevelopers: debounce(function (name) {
            if (name.length < 3) {
                this.developers = []
                return
            }

            this.isFetching = true

            axios.get(`/api/developers?query=${name}`)
            .then( response => {
                this.developers = response.data.data
            })
            .catch(error => {
                this.data = []
                throw error
            })
            .finally( () => this.isFetching = false)
        }, 500)
    },
}
</script>
