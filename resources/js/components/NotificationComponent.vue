<script>
export default {
    render: () => null,
    props: {
        message: String,
        duration: {
            type: Number,
            default: null,
        },
        type: {
            type: String,
            default: null,
        }
    },
    methods: {
        notify() {
            this.$buefy.toast.open({
                message: this.message,
                type: this.type,
                duration: this.duration,
            })
        }
    },
    mounted() {
        this.notify();
    },
}
</script>
