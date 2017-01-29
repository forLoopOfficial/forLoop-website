<template>

  <!-- page content -->
  <div class="right_col" role="main">
    <router-view></router-view>
  </div>
  <!-- /page content -->

</template>

<script>
import firebase from 'firebase';
const db = firebase.database();
export default {
  name: 'ManagePages'
  //lifecycle methods

}

</script>

<style>

</style>
