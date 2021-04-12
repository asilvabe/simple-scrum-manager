require('./bootstrap')
require('./buefy')

import DeleteComponent from "./components/DeleteComponent";
import LogoutComponent from "./components/LogoutComponent";
import NotificationComponent from "./components/NotificationComponent";

const app = new Vue({
    el: '#app',
    components: {
        DeleteComponent,
        LogoutComponent,
        NotificationComponent,
    }
})
