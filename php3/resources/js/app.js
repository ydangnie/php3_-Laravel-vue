import './bootstrap';
import { createApp } from 'vue';
import welcome from '@/components/view/welcome.vue';

import Alpine from 'alpinejs';
const app = createApp({});


app.component('welcome', welcome);

app.mount('#app');







window.Alpine = Alpine;

Alpine.start();