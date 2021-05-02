<template>
    <b-table :data="developers" :loading="loading" :mobile-cards="mobileCards">
        <slot></slot>
    </b-table>
</template>
<script>
import NumberMixin from "../../mixins/NumberMixin";
export default {
    mixins: [NumberMixin],
    name: 'DeveloperTeamIndex',
    data: () => ({
        developers: [],
        loading: true,
        mobileCards: false,
    }),
    props: {
        route: String
    },
    mounted() {
        this.get();
        this.$root.$on(
            ['developer-team:stored', 'developer-team:deleted', 'developer-team:refresh'],
            () => this.get()
        )
    },
    methods: {
        get() {
            this.loading = true
            axios.get(this.route)
                .then(response => {
                    this.developers = [];
                    for (let developer of response.data.data) {
                        this.developers.push({
                            id: developer.id,
                            level: developer.level,
                            name: developer.name,
                            email: developer.email,
                            sprints_count: this.humanize(developer.sprints_count),
                            sp_assigned: this.humanize(developer.sp_assigned),
                            sp_consumed: this.humanize(developer.sp_consumed),
                            velocity: this.humanize(developer.velocity),
                            compliance: this.compliance(developer.compliance),
                        });
                    }
                })
                .finally(() => {
                    this.loading = false
                })
        },
        humanize(value) {
            return value ? this.commarize(parseInt(value)) : '-';
        },
        compliance(value) {
            return value ? value.toString() + '%' : '-';
        }
    }
}
</script>
