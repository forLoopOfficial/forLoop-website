<template>

  <!-- page content -->
  <div class="">
    <h1>About Page</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Change About Page Description</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="" @submit.prevent="changeAboutDescription">
              <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <textarea v-model="about_page.description" name="description" placeholder="About Page Description">

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
            <h2>Upload Images</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="" @submit.prevent="uploadImages">
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
            <h2>Image Gallery</h2>
            <!-- <button type="button" name="button" @click="openAddSponsorModal">Add Sponsor</button> -->
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
              <div v-for="(image, key) in about_page.images" class="col-md-55">
                <div class="thumbnail">
                  <div class="image view view-first">
                    <img style="width: 100%; display: block;" :src="image.image_url" alt="image" />
                    <div class="mask">
                      <p>{{ image.order }}</p>
                      <div class="tools tools-bottom">
                        <a :href="image.link" target="_blank"><i class="fa fa-link"></i></a>
                        <a href=""><i class="fa fa-pencil"></i></a>
                        <a @click="removeImage(key)"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="caption">
                    <p></p>
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

const aboutPageRef = firebase.database().ref('about_page');
const aboutPageImageRef = firebase.storage().ref('about_page');
export default {
  name: 'AboutPage',
  //lifecycle methods
  data () {
    return {
      updatingDescription: false,
      uploadingImages: false,
      imageFiles: []
    }
  },

  firebase: {
    about_page: {
      source: aboutPageRef,
      asObject: true
    }
  },
  methods: {
    changeAboutDescription () {
      let description = {
        description: this.about_page.description
      };
      this.updatingDescription = true;
      this.$firebaseRefs.about_page.update(description, (error) => {
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
    },
    removeImage (key) {
      console.log(`removing ${key}`);
      this.$firebaseRefs.about_page.child(`images/${key}`).remove();
      alert('Image successfully removed');
    }
  }
}

</script>

<style>

</style>
