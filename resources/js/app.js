/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import routes from './routes.js';
import index from './index.vue';
import AdminNavigator from './components/admin/AdminNavigator.vue';
import VueRouter from 'vue-router';
import vuetify from './vuetify';

import coreState from './coreState.js';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faPen, faTrash, faCamera, faSignOutAlt } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faPen, faTrash, faCamera, faSignOutAlt);

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)


require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify,
    router : new VueRouter(
        routes // short for `routes: routes`
        ),
        components:{index, AdminNavigator},
        store: coreState,
});
