<template>

  <!-- page content -->
  <div class="">
    <h1>Team Page</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Change Team Page Description</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="" @submit.prevent="changeTeamDescription">
              <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <textarea v-model="team_page.description" name="description" placeholder="Team Page Description">

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
            <h2>Add Team Member</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div v-if="newMember" class="speaker_content">
                <div class="icon">
                  <img :src="newMember.profile_image" width="48" height="48">
                </div>
                <div class="inner">
                  <label for="">Change name</label><input v-model="newMember.name" type="text" placeholder="Change name" :style="{ width: '100%' }">
                  <label for="">Change handle</label><input v-model="newMember.twitter_handle" type="text" placeholder="Change handle" :style="{ width: '100%' }">
                </div>
              </div>
              <add-contributor @add="addProfile"></add-contributor>
              <button @click="addTeamMember" class="btn btn-success" :disabled="addingMember">Save Member</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Team Members</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
              <div v-for="(member, key) in team_page.members" class="col-md-4 col-sm-4 col-xs-12 profile_details">
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
import AddContributor from '../events/AddContributor.vue';

const teamPageRef = firebase.database().ref('team_page');
const teamPageImageRef = firebase.storage().ref('team_page');
export default {
  name: 'TeamPage',
  components: {
    AddContributor
  },
  //lifecycle methods

  data () {
    return {
      newMember: null,
      updatingDescription: false,
      addingMember: false
    }
  },
  firebase: {
    team_page: {
      source: teamPageRef,
      asObject: true
    }
  },
  methods: {
    changeTeamDescription () {
      let description = {
        description: this.team_page.description
      };
      this.updatingDescription = true;
      this.$firebaseRefs.team_page.update(description, (error) => {
        if(error){
          console.log(error);
          alert(`Issue Updating Description: ${error.message}`);
        }else{
          alert('Description successfully modified');
        }
        this.updatingDescription = false;
      });
    },
    addProfile (member) {
      console.log(member);
      this.newMember = {
        name: member.name,
        twitter_handle: member.screen_name,
        profile_image: member.profile_image
      }
    },
    addTeamMember () {
      this.addingMember = true;
      teamPageRef.child('members').push(this.newMember).then(() => {
        this.addingMember = false;
        alert('Member successfully added')
      })
      .catch((error) => {
        this.addingMember = false;
        alert(`Issue adding member: ${error.message}`);
      });
    },
    removeMember (key) {
      console.log(`Removing key: ${key}`);
      teamPageRef.child(`members/${key}`).remove();
    }
  }

}

</script>

<style>

</style>
