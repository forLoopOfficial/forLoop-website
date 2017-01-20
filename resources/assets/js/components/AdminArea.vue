<template>

<div class="">
  <sidebar v-if="user" :user="user"></sidebar>
  <router-view></router-view>
  <!-- footer content -->
  <footer>
    <div class="pull-right">
      Powered by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
</div>

</template>


<script>
import Sidebar from './Sidebar.vue';
import firebase from 'firebase';
export default {
  name: 'AdminArea',
  //lifecycle methods
  created () {
    this.user = firebase.auth().currentUser;
    firebase.auth().onAuthStateChanged(function( user ) {
      this.user = user;
    }.bind(this));
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
