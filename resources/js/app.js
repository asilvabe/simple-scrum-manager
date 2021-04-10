require('./bootstrap')
require('./buefy')

import ConfirmDeleteComponent from "./components/ConfirmDeleteComponent";
import DeleteFormComponent from "./components/DeleteFormComponent";
import LogoutComponent from "./components/LogoutComponent";
import NotificationComponent from "./components/NotificationComponent";

const app = new Vue({
    el: '#app',
    components: {
        ConfirmDeleteComponent,
        DeleteFormComponent,
        LogoutComponent,
        NotificationComponent,
    }
})
