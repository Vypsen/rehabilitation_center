
import './bootstrap';
import { createApp } from 'vue';
import router from './router/router';
import App from './components/App.vue'
import store from './store';

createApp(App)
    .use(router)
    .use(store)
    .mount('#app');


//
// import './bootstrap';
//
// import {createApp} from 'vue'
// import App from './components/App.vue'
//
// createApp(App).mount("#app")
