import './bootstrap';
// require('./bootstrap')

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import ListComponent from './ListComponent.vue'
import ListButtons from './ListButtons.vue'

const app = createApp({})

app.component('list-buttons', ListButtons)
app.component('example-component', ExampleComponent)
app.component('list-component', ListComponent)

app.mount('#app')
