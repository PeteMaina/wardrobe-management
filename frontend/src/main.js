import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axios from 'axios';

axios.defaults.baseURL = 'http://127.0.0.1:8000/api'; // Set Laravel API Base URL
axios.defaults.withCredentials = true;

const app = createApp(App);
app.use(router);
app.mount('#app');
