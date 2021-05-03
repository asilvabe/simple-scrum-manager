<script>
export default {
    render: () => null,
    props: {
        message: String,
        type: {
            type: String,
            default: null,
        }
    },
    methods: {
        notify() {
            this.$root.$emit(`notify:${this.type}`, this.message)
        }
    },
    mounted() {
        this.notify();
    },
}
</script>
