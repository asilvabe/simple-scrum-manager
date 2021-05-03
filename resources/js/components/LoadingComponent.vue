<template>
    <b-loading :is-full-page="isFullPage" v-model="isLoading" :can-cancel="canCancel"></b-loading>
</template>
<script>
export default {
    data: () => ({
        isLoading: false,
        isFullPage: true,
        canCancel: true,
    }),
    mounted() {
        this.$root.$on('loading', data => {
            this.isLoading = true
            this.isFullPage = data.isFullPage
            this.canCancel = data.canCancel
        })
    }
}
</script>
