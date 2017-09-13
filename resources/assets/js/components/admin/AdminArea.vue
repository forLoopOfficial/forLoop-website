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

const usersRef = firebase.database().ref('users');
export default {
  name: 'AdminArea',
  //lifecycle methods
  created () {
    let user = firebase.app('AdminApp').auth().currentUser;
    this.setUserData(user);
    firebase.app('AdminApp').auth().onAuthStateChanged(function( user ) {
      this.setUserData(user);
      this.mergeUserData();
    }.bind(this));
  },

  components: {
    Sidebar
  },
  data () {
    return {
      user: null
    }
  },
  methods: {
    mergeUserData () {
      if(this.user === null)
        return;

      let uid = this.user.uid;
      usersRef.child(uid).once('value').then((snapshot) => {
        this.user.extra = snapshot.val();
        if(!this.user.extra)
          this.setUserData(null);
      });

    },
    setUserData (user) {
      if(!user){
        this.user = null;
        return;
      }

      this.user = {
        providerData: user.providerData,
        photoURL: user.photoURL,
        email: user.email,
        displayName: user.displayName,
        uid: user.uid,
        extra: {}
      };
    }
  }
}

</script>

<style>
</style>
