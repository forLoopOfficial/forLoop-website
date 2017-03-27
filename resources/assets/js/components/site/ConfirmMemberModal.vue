<template>

  <!-- Component content -->
  <b-modal :closeOnBackdrop='false'>
    <div slot="modal-header">
      <h4 class="modal-title" id="myModalLabel" style="text-align:center">Confirm Member Details</h4>
    </div>
    <div slot="modal-body">
      <form @submit.prevent="confirmMember" class="form-horizontal form-label-left">

        <div class="form-group">
          <div class="members__avatar">
              <img :src="user.photoUrl" alt="" class="img-circle" height="72" width="72">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.displayName" type="text" class="form-control" placeholder="Full Name">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Location </label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.location" type="text" class="form-control" placeholder="Location">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Position/Role</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.role" type="text" class="form-control" placeholder="Role">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Skills</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.skills" type="text" class="form-control" placeholder="Comma separated list of skills">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Github Profile</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.github_link" type="text" class="form-control" placeholder="Github Profile Link">
          </div>
        </div>
        <div class="form-group has-feedbacl">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Twitter Profile</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input v-model="user.twitter_link" type="text" class="form-control has-feedback-left col-md-10" placeholder="Twitter Profile Link">
            <span class="fa fa-at form-control-feedback left"></span>
          </div>
        </div>

      </form>
    </div>
    <div slot="modal-footer">
      <button @click="save" type="button" class="btn btn-primary">Save changes</button>
    </div>
  </b-modal>
  <!-- /Component content -->

</template>


<script>
import firebase from 'firebase';

const membersRef = firebase.database().ref('members_page/members');
export default {
  name: 'ConfirmMember',

  props: ['show', 'user'],
  watch: {
    show: function (val, old) {
      if(val)
        this.$children[0].show();
    }
  },
  methods: {
    confirmMember () {

    },
    parseLink (token, type) {
      if(token == undefined)
        return;

      let url = "";
      if(token.indexOf(type) === 0 || token.indexOf('www') === 0){
        url = `https://${token}`;
      }else if(token.indexOf(type) === -1){
        url = `https://${type}/${token}`;
      }else{
        url = token;
      }
      return url;
    },
    save () {
      this.user.skills = this.user.skills.split(",");
      this.user.github_link = this.parseLink(this.user.github_link, 'github.com');
      this.user.twitter_link = this.parseLink(this.user.twitter_link, 'twitter.com');
      membersRef.child(this.user.uid).set(this.user);
      this.close();
    },
    close () {
      this.$children[0].hide();
    }
  }
}

</script>

<style>

</style>
