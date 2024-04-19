import './bootstrap';

// Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';

// Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

import { createApp } from 'vue';
import adminApp from './app.vue';
import router from './router';
import store from './store';
////////////////////////////////////////////////
import { apolloProvider } from './vue-apollo'
////////////////////////////////////////////////

const vueApp = createApp(adminApp);
vueApp.use(router);
vueApp.use(store);
vueApp.use(apolloProvider); ////////////////////
vueApp.mount('#app')
