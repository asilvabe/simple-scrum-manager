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
    mounted() {
        this.$root.$on('prepare-for-deletion', data => {
            this.route = data.route;
        });
        this.$root.$on('cancel', data => {
            this.route = null;
        });
        this.$root.$on('delete-item', data => {
            this.$refs.deleteForm.submit();
        });
    }
}
</script>
