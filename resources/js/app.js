require('./bootstrap')
require('./buefy')
require('./event-bus')

const app = new Vue({
    el: '#app',
    mounted() {
        this.$on('auth:logout', () => {
            eventBus.$emit('auth:logout')
        })
    }
})
