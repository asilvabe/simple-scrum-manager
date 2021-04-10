<template>
    <div class="is-invisible">
        <slot/>
    </div>
</template>
<script>
export default {
    mounted() {
        this.$root.$on('auth:logout', () => {
            document.getElementById('logoutForm').submit();
        });
    }
};
</script>
