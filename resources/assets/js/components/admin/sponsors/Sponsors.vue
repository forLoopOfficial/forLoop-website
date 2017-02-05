<template>

  <!-- page content -->
  <div class="right_col" role="main">
    <h1>Sponsors</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add Sponsor</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="" @submit.prevent="addSponsor">
              <div class="row">
                  <div class="col-md-3">
                    <input v-model="newSponsor.name" type="text" class="form-control" placeholder="Sponsor name">
                  </div>
                  <div class="col-md-6">
                    <input @change="onFileChange" type="file" class="form-control" placeholder="Upload Sponsor logo">
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Add Sponsor</button>
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
            <h2>Sponsors Gallery</h2>
            <!-- <button type="button" name="button" @click="openAddSponsorModal">Add Sponsor</button> -->
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
              <Sponsor v-for="sponsor in sponsors" :sponsor="sponsor"></Sponsor>
            </div>
          </div>
        </div>
      </div>
    </div>
    <bounce-loader :loading="loading" :color="blue"></bounce-loader>
  </div>
  <!-- /page content -->
</template>

<script>
import firebase from 'firebase';

import BounceLoader  from 'vue-spinner/src/BounceLoader';
import Sponsor       from './Sponsor.vue';
import CreateSponsor from './CreateSponsor.vue';

const db      = firebase.database();
const storage = firebase.storage();
const sponsorsRef      = db.ref('sponsors');
const sponsorsImageRef = storage.ref('sponsors');

const CreateSponsorComponent = Vue.extend(CreateSponsor);
const openSponsorModal = () => {
  const modal = new CreateSponsorComponent({
    el: document.createElement('div')
  });
  return modal;
}

export default {
  name: 'Sponsors',
  //lifecycle methods

  data () {
    return {
      loading: false,
      imageFile: null,
      newSponsor: {
        name: '',
        link: '',
        image_url: null
      }
    }
  },
  components: {
    Sponsor,
    CreateSponsor,
    BounceLoader
  },
  //Vuefire binding
  firebase: {
    sponsors: sponsorsRef
  },
  methods: {
    openAddSponsorModal () {
      const modal = openSponsorModal();
      console.log(modal);
    },
    addSponsor () {
      let imageName = this.imageFile.name;
      let imageRef  = sponsorsImageRef.child(imageName);
      imageRef.put(this.imageFile).then((snapshot) => {
        this.newSponsor.image_url = snapshot.downloadURL;
        console.log(this.newSponsor);
        sponsorsRef.push(this.newSponsor);
      })
      .catch((error) =>{
        console.log(error);
        alert("Issue Uploading Images");
      })


    },
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      console.log(files);
      this.imageFile = files[0];
    }
  }
}

</script>

<style>

</style>
