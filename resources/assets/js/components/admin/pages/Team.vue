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
            <form class="" @submit.prevent="addTeamMember">
              <div class="row">
                <div class="col-md-6">
                  <input @change="onFileChange" type="file" class="form-control" placeholder="Upload Images" multiple>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary" :disabled="uploadingImages">Upload Images</button>
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
            <h2>Team Members</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>Digital Strategist</i></h4>
                    <div class="left col-xs-7">
                      <h2>Nicole Pearson</h2>
                      <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-building"></i> Address: </li>
                        <li><i class="fa fa-phone"></i> Phone #: </li>
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <p class="ratings">
                        <a>4.0</a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star-o"></span></a>
                      </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                        </i> <i class="fa fa-comments-o"></i> </button>
                      <button type="button" class="btn btn-primary btn-xs">
                        <i class="fa fa-user"> </i> View Profile
                      </button>
                    </div>
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

const teamPageRef = firebase.database().ref('team_page');
const teamPageImageRef = firebase.storage().ref('team_page');
export default {
  name: 'TeamPage',
  //lifecycle methods

  data () {
    return {
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
    uploadImages () {
      this.uploadingImages = true;
      let imagesPromise = this.imageFiles.map((file) => {
        return aboutPageImageRef.child(file.name).put(file);
      });
      Promise.all(imagesPromise).then((snapshots) => {
        snapshots.forEach((snapshot, index) => {
          let image = {
            image_url: snapshot.downloadURL,
            order: index
          }
          aboutPageRef.child('images').push(image);
        });
        this.uploadingImages = false;
        alert("Images Uploaded");
      })
      .catch((error) =>{
        this.uploadImages = false;
        console.log(error);
        alert("Issue Uploading Images");
      })
    },
    onFileChange (e) {
      this.imageFiles = [];
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      for(let i = 0; i < files.length; i++)
        this.imageFiles.push(files[i]);
    }
  }

}

</script>

<style>

</style>
