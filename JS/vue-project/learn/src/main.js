import { createApp } from 'vue'
import App from './App.vue'
import {i1} from './learn'
import {
    i2,
    i3
} from './learn'
import Test from './learn'

console.log(`Переменная i1 = ${i1}`);
console.log(i2, i3);
console.log(`Переменная i4 = ${Test.i4}`);

createApp(App).mount('#app')
