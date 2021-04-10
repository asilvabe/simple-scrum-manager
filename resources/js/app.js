require('./bootstrap')
require('./buefy')

import ConfirmDeleteComponent from "./components/ConfirmDeleteComponent";
import DeleteFormComponent from "./components/DeleteFormComponent";

const app = new Vue({
    el: '#app',
    components: {
        ConfirmDeleteComponent,
        DeleteFormComponent,
    },
    mounted() {
        this.$on('auth:logout', () => {
            eventBus.$emit('auth:logout')
        })
    }
})
