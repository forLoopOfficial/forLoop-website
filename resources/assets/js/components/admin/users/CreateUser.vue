<template>

  <!-- Component content -->
  <b-modal>
    <div slot="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="myModalLabel">Add Admin</h4>
    </div>
    <div slot="modal-body">
      <form @submit.prevent="addAdmin" class="form-horizontal form-label-left">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.email" type="email" class="form-control" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Password </label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.password" type="password" class="form-control" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select v-model="user.role" class="form-control">
              <option value="admin">Admin</option>
              <option value="superadmin">Super Admin</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.first_name" type="text" class="form-control" placeholder="First Name">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.last_name" type="text" class="form-control" placeholder="Last Name">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Twitter Handle</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.twitter_handle" type="text" class="form-control col-md-10" placeholder="Twitter Handle">
          </div>
        </div>

      </form>
    </div>
    <div slot="modal-footer">
      <button @click="close" type="button" class="btn btn-default">Close</button>
      <button @click="save" type="button" class="btn btn-primary">Save changes</button>
    </div>
  </b-modal>
  <!-- /Component content -->

</template>


<script>
import firebase from 'firebase';

const usersRef = firebase.database().ref('users');
export default {
  name: 'CreateUser',

  props: ['show'],
  //Vuefire binding
  firebase: {
    users: usersRef
  },
  data () {
    return {
      user: {}
    }
  },
  watch: {
    show: function (val, old) {
      if(val)
        this.$children[0].show();
    }
  },
  methods: {
    save () {
      console.log(this.user);
      
    },
    close () {
      this.$children[0].hide();
    }
  }
}

</script>

<style>

</style>
