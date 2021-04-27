<script>
import DeveloperTeamFormComponent from "./DeveloperTeamFormComponent";

export default {
    render: () => null,
    components: {
        DeveloperTeamFormComponent
    },
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
        showModal() {
            this.$buefy.modal.open({
                parent: this,
                component: DeveloperTeamFormComponent,
                canCancel: ['escape', 'outside'],
                props: {
                    team: this.team,
                    label: this.label,
                    saveText: this.saveText,
                    cancelText: this.cancelText,
                },
                fullScreen: false,
                width: '400px',
            });
        }
    },
    mounted() {
        this.$root.$on('developer-team:create', () => this.showModal())
    }
}
</script>
