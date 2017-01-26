<template>

  <!-- Component content -->
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Admin Contacts</h3>
        <button @click="showModal" type="button" class="btn btn-primary">Add User</button>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <user-contact-box v-for="user in users" :user="user"></user-contact-box>
              <h2 v-if="!users">No Users</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <create-user :show="show"></create-user>
  </div>
  <!-- /Component content -->

</template>


<script>
import firebase from 'firebase';
import UserContactBox from './UserContactBox.vue';
import CreateUser     from './CreateUser.vue';

const usersRef = firebase.database().ref('users');
export default {
  name: 'ViewUsers',
  //lifecycle methods
  created () {
    this.$root.$on('hidden::modal', () => {
      this.show = false;
    });
  },

  components: {
    UserContactBox,
    CreateUser
  },
  //Vuefire binding
  firebase: {
    users: usersRef
  },
  data () {
    return {
      show: false
    }
  },
  methods: {
    showModal () {
      this.show = true;
    }
  }
}

</script>

<style>

</style>
