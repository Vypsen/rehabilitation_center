
import './bootstrap';
import '../public/css/app.css'
import { createApp } from 'vue';
import router from './router/router';
import App from './components/App'
import store from './store/index';

createApp(App)
    .use(router)
    .use(store)
    .mount('#app');
