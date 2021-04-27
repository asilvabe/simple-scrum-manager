<template>
    <b-table :data="developers" :loading="loading" :mobile-cards="mobileCards">
        <slot></slot>
    </b-table>
</template>
<script>
export default {
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
            axios.get(this.route)
                .then(response => {
                    this.developers = response.data.data
                    this.loading = false
                })
        }
    }
}
</script>
