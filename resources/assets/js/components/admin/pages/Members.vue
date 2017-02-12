<template>

  <!-- page content -->
  <div class="">
    <h1>Members Page</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Change Members Page Description</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="" @submit.prevent="changeMembersDescription">
              <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <textarea v-model="members_page.description" name="description" placeholder="Members Page Description">

                    </textarea>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <input type="submit" name="name" class="btn btn-success" value="Change Description" :disabled="updatingDescription">
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Public Members</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
              <div v-for="(member, key) in members_page.members" class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <div class="left col-xs-7">
                      <h2>{{member.name}}</h2>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img :src="member.profile_image" alt="" class="img-circle img-responsive" width="48" height="48">
                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    <button @click="removeMember(key)" class="btn btn-xs btn-danger" name="button">X</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

</template>

<script>
import firebase from 'firebase';

const membersPageRef = firebase.database().ref('members_page');
export default {
  name: 'MembersPage',
  //lifecycle methods

  data () {
    return {
      newMember: null,
      updatingDescription: false,
      addingMember: false
    }
  },
  firebase: {
    members_page: {
      source: membersPageRef,
      asObject: true
    }
  },
  methods: {
    changeMembersDescription () {
      let description = {
        description: this.members_page.description
      };
      this.updatingDescription = true;
      this.$firebaseRefs.members_page.update(description, (error) => {
        if(error){
          console.log(error);
          alert(`Issue Updating Description: ${error.message}`);
        }else{
          alert('Description successfully modified');
        }
        this.updatingDescription = false;
      });
    }
  }
}

</script>

<style>

</style>
