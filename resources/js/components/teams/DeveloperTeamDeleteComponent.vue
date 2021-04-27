<script>
export default {
    render: () => null,
    data: () => ({
        developer: null
    }),
    props: {
        team: {
            type: Number,
            required: true
        }
    },
    mounted() {
        this.$root.$on('developer-team:delete', developer => {
            this.developer = developer
            this.showConfirmationDialog()
        })
    },
    methods: {
        showConfirmationDialog() {
            this.$buefy.dialog.confirm({
                title: 'Detach developer',
                message: 'Are you sure?',
                type: 'is-danger',
                hasIcon: true,
                onConfirm: () => this.deleteItem(),
            })
        },
        deleteItem() {
            axios.delete(`/api/developer-teams/${this.developer}`)
            .then(() => this.$root.$emit('developer-team:deleted'))
        }
    }
}
</script>
