<template>

<div class="">
  <sidebar v-if="user" :user="user"></sidebar>
  <router-view></router-view>
</div>

</template>


<script>
import Sidebar from './Sidebar.vue';
import firebase from 'firebase';
export default {
  created () {
    this.user = null;
    firebase.auth().onAuthStateChanged(function( user ) {
      this.user = user;
    });
  },
  components: {
    Sidebar
  },
  data () {
    return {
      notes: []
    }
  }
}

</script>

<style>

</style>
