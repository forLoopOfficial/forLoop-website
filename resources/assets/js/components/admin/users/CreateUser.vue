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
            <input v-model="user.email" type="email" class="form-control" placeholder="Email" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Password </label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.password" type="password" class="form-control" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select v-model="user.role" class="form-control" required>
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
        <div class="form-group has-feedbacl">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Twitter Handle</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.twitter_handle" type="text" class="form-control has-feedback-left col-md-10" placeholder="Twitter Handle" required>
            <span class="fa fa-at form-control-feedback left"></span>
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

const adminCreateApp = firebase.app('AdminCreateApp');
const usersRef = firebase.app('AdminApp').database().ref('users');
export default {
  name: 'CreateUser',

  props: ['show'],
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
      if(!this.user.role || !this.user.password || !this.user.email)
        return alert('Must fill all required fields');
      // hack - use another firebase app instance to prevent current user in
      // default app from being signed out
      adminCreateApp.auth().createUserWithEmailAndPassword(this.user.email, this.user.password)
        .then((user) => {
          console.log(user, this, new Date());
          let uid = user.uid;
          let { first_name='', last_name='', twitter_handle = '', role, email} = this.user;
          let newUser = {
            first_name,
            last_name,
            twitter_handle,
            role,
            email
          }
          usersRef.child(uid).set(newUser);
          this.close();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    close () {
      this.$children[0].hide();
    }
  }
}

</script>

<style>

</style>
