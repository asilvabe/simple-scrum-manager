<template>
    <div>
        <b-button
            :label="this.label"
            :icon-left="this.icon"
            :size="this.size"
            type="is-danger"
            @click="confirmDeletion">
        </b-button>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        message: String,
        confirmText: String,
        cancelText: String,
        route: String,
        label: {
            type: String,
            default: null,
        },
        icon: String,
        size: {
            type: String,
            default: null,
        }
    },
    methods: {
        confirmDeletion() {
            this.$root.$emit('prepare-for-deletion', {route: this.route});
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
            this.$root.$emit('delete-item');
        }
    },

}
</script>
