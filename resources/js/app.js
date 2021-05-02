require('./bootstrap')
require('./buefy')

import DeleteComponent from "./components/DeleteComponent"
import LogoutComponent from "./components/LogoutComponent"
import NotificationComponent from "./components/NotificationComponent"
import DeveloperTeamIndex from "./components/teams/DeveloperTeamIndex"
import DeveloperTeamCreate from "./components/teams/DeveloperTeamCreate"
import LoadingComponent from "./components/LoadingComponent"
import NotifyComponent from "./components/NotifyComponent"
import DeveloperTeamDelete from "./components/teams/DeveloperTeamDelete"

const app = new Vue({
    el: '#app',
    components: {
        DeleteComponent,
        LogoutComponent,
        NotificationComponent,
        NotifyComponent,
        LoadingComponent,
        DeveloperTeamIndex,
        DeveloperTeamCreate,
        DeveloperTeamDelete
    }
})

window.axios.interceptors.response.use(
    function(response) {
        if (response.data.message) {
            app.$emit('notify:success', response.data.message)
        }
        return response;
    },
    function(error) {
        let errorMessage = error.response.data.message ?? 'An error occurred while processing your request';

        app.$emit('notify:danger', errorMessage)
        return Promise.reject(error.response)
    }
)
