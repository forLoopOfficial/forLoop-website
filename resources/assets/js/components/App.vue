<template>
  <div>
    <app-bar></app-bar>
    <router-view></router-view>
    <app-footer></app-footer>
  </div>
</template>


<script>
import AppBar from './site/AppBar.vue';
import AppFooter from './site/AppFooter.vue';

export default {
  name: 'App',

  components: {
    AppBar,
    AppFooter
  }
}

</script>

<style>

</style>
