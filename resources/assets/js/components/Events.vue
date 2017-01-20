<template>

<div class="">
</div>

</template>

<script>
import firebase from 'firebase';
import Sponsor from './Event.vue';
const db = firebase.database();
export default {
  //lifecycle methods

  components: {
    Sponsor
  },
  firebase: {
    sponsors: db.ref('events')
  }
}

</script>

<style>

</style>
