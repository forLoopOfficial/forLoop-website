
// window._ = require('lodash');
require('datejs');
// Initialize Firebase
let config;
if(process.env.NODE_ENV !== 'production') {
  console.log(process.env);
  config = {
    apiKey: "AIzaSyAcjFtRHmXguek060FhPql3KH_--AXoEjs",
    authDomain: "forloop-74a2a.firebaseapp.com",
    databaseURL: "https://forloop-74a2a.firebaseio.com",
    storageBucket: "forloop-74a2a.appspot.com",
    messagingSenderId: "296148842604"
  };

}else {
  console.log(process.env);
  config = {
    apiKey: "AIzaSyCK_-UkPvs-xjqMriFfntP6xLrCDS3sUqw",
    authDomain: "forloop-be249.firebaseapp.com",
    databaseURL: "https://forloop-be249.firebaseio.com",
    storageBucket: "forloop-be249.appspot.com",
    messagingSenderId: "332051163114"
  };
}

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
const vueResource   = require('vue-resource');
const vueRouter     = require('vue-router');
const vueFire       = require('vuefire');
const firebase      = require('firebase');
const bootstrapVue  = require('bootstrap-vue');
const algolia       = require('algoliasearch');
window.firebase     = firebase;
Vue.use(vueResource);
Vue.use(vueRouter);
Vue.use(vueFire);

const algoliaClient = new algolia("3O8L0EHCV6", "684c18cb580eed969bb80b18c2dab3f7");
window.algoliaClient = algoliaClient;
firebase.initializeApp(config);

const App           = require('./components/App.vue');
const HomePage      = (resolve, reject) => {
  require.ensure(['./components/site/HomePage.vue'], () => {
    resolve(require('./components/site/HomePage.vue'));
  });
};
const AboutPage     = (resolve, reject) => {
  require.ensure(['./components/site/AboutPage.vue'], () => {
    resolve(require('./components/site/AboutPage.vue'));
  });
};
const MembersPage   = (resolve, reject) => {
  require.ensure(['./components/site/MembersPage.vue'], () => {
    resolve(require('./components/site/MembersPage.vue'));
  });
};
const TeamPage      = (resolve, reject) => {
  require.ensure(['./components/site/TeamPage.vue'], () => {
    resolve(require('./components/site/TeamPage.vue'));
  });
};
const EventPage     = (resolve, reject) => {
  require.ensure(['./components/site/EventPage.vue'], () => {
    resolve(require('./components/site/EventPage.vue'));
  });
};
const MeetupsPage   = (resolve, reject) => {
  require.ensure(['./components/site/MeetupsPage.vue'], () => {
    resolve(require('./components/site/MeetupsPage.vue'));
  });
};

//Define admin application routes
const routes = [
  {
    path: '/about',
    component: AboutPage,
  },
  {
    path: '/team',
    component: TeamPage,
  },
  {
    name: 'event',
    path: '/events/:slug',
    component: EventPage
  },
  {
    path: '/meetups',
    component: MeetupsPage,
  },
  {
    path: '/members',
    component: MembersPage,
  },
  {
    path: '/',
    component: HomePage,
  }
]

const router = new vueRouter({
  mode: 'history',
  base: '/',
  routes
});

new Vue({
  el: '#app',
  router,
  ...App
});

/**
 * We'll register global filters here
 */

Vue.filter('dateFormat', (value) => {
    return new Date(value).toString('dddd MMM d yyyy');//custom format by datejs
});

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

    next();
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
