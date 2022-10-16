import './bootstrap';

import {createApp} from 'vue';
import App from './App.vue';
import router from './router.js';
import store from '@/store/index.js'
import axios from 'axios';

axios.defaults.baseURL='http://laundry.test/api';

const app = createApp(App);

app.use(router);
app.use(store);

app.mount('#app');