import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.mount('#app');

require("./bootstrap");
window.Vue = require("vue");

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

// import * as VueGoogleMaps from 'vue2-google-maps';

// Vue.use(VueGoogleMaps, {
//     load: {
//         key: ""
//     }
// })

// const app = new Vue({ el: "#app" });

// import Vue from 'vue';
// import * as VueGoogleMaps from 'vue2-google-maps';
// import App from './components/App.vue';

// Vue.use(VueGoogleMaps, {
//   load: {
//     key: 'YOUR_GOOGLE_MAPS_API_KEY',
//     libraries: 'places',
//   },
// });

// new Vue({
//   render: h => h(App),
// }).$mount('#app');
