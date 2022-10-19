import './bootstrap';

import { createApp } from 'vue';

import App from './App.vue';

import router from './router.js';
import store from '@/store/index.js';
import axios from 'axios';

import Toast from 'vue-toastification';
// Import the CSS or use your own!
import 'vue-toastification/dist/index.css';

axios.defaults.baseURL = 'http://laundry.test/api';
store.dispatch('getUser').then(() => {
    const app = createApp(App);

    app.use(router);
    app.use(store);
    app.use(Toast);

    app.mount('#app');
});
