<template>
    <form ref="deleteForm" :action="this.route" method="post" class="is-hidden">
        <slot></slot>
    </form>
</template>
<script>
export default {
    data: () => {
        return {
            route: null,
        }
    },
    props: {
        title: String,
        message: String,
        confirmText: String,
        cancelText: String,
    },
    mounted() {
        this.$root.$on('confirm-delete', data => {
            this.route = data.route;
            this.showConfirmationDialog();
        });
    },
    methods: {
        showConfirmationDialog() {
            this.$buefy.dialog.confirm({
                title: this.title,
                message: this.message,
                confirmText: this.confirmText,
                cancelText: this.cancelText,
                type: 'is-danger',
                hasIcon: true,
                onConfirm: () => this.deleteItem(),
            })
        },
        deleteItem() {
            this.$refs.deleteForm.submit();
        }
    },

}
</script>
