import './bootstrap';

// Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';

// Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

import { createApp } from 'vue';

import app from './components/app.vue';

import router from './router';

createApp(app).use(router).mount('#app');

