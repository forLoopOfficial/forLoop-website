
window._ = require('lodash');
// Initialize Firebase
const config = {
  apiKey: "AIzaSyAcjFtRHmXguek060FhPql3KH_--AXoEjs",
  authDomain: "forloop-74a2a.firebaseapp.com",
  databaseURL: "https://forloop-74a2a.firebaseio.com",
  storageBucket: "forloop-74a2a.appspot.com",
  messagingSenderId: "296148842604"
};
/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
const vueResource = require('vue-resource');
const vueRouter   = require('vue-router');
const vueFire     = require('vuefire');
const firebase    = require('firebase');
window.firebase   = firebase;
Vue.use(vueResource);
Vue.use(vueRouter);
Vue.use(vueFire);


firebase.initializeApp(config);

const authState = function () {
  return new Promise((resolve, reject) => {
          firebase.auth().onAuthStateChanged(user => {
            if(user){
              resolve(user);
            }else{
              reject(new Error("No User"));
            }
          });
  });
}

const App       = require('./components/App.vue');
const AdminArea = require('./components/AdminArea.vue');
const Dashboard = require('./components/Dashboard.vue');
const Sponsors  = require('./components/Sponsors.vue');
const Events    = require('./components/Events.vue');
const Login     = require('./components/Login.vue');

//Define admin application routes
const routes = [
  { path: '/', component: AdminArea,
    children: [
      {
        path: 'login', component: Login
      },
      {
        path: 'dashboard', component: Dashboard,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: 'events', component: Events,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: 'sponsors', component: Sponsors,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: 'pages', component: Dashboard,
        children: [
          {
            path: 'about', component: Dashboard,
            meta: {
              requiresAuth: true
            }
          },
          {
            path: 'team', component: Dashboard,
            meta: {
              requiresAuth: true
            }
          },
          {
            path: 'members', component: Dashboard,
            meta: {
              requiresAuth: true
            }
          }
        ]
      },
      {
        path: '', redirect: 'dashboard'
      }
    ]
  }
]

const router = new vueRouter({
  mode: 'history',
  base: '/admin',
  routes
});
router.beforeEach((to, from, next) => {

  if(!to.meta.requiresAuth){
    next()
  }
  authState().then(user => next(), () => next({path: '/login'}));
});

new Vue({
  el: '#app',
  router,
  ...App
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
