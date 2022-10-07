
import './bootstrap';
import { createApp } from 'vue';
import App from './components/App'


const app = createApp({});

app.component('hello-world', App)

app.mount('#app');
