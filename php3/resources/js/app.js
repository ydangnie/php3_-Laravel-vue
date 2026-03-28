import './bootstrap';
import { createApp } from 'vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';


import Alpine from 'alpinejs';
const app = createApp({});



app.mount('#app');







window.Alpine = Alpine;

Alpine.start();