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
                    <textarea name="name">

                    </textarea>
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
  </div>
  <!-- /page content -->

</template>

<script>
import firebase from 'firebase';

const aboutPageRef = firebase.database().ref('about_page');
export default {
  name: 'AboutPage'
  //lifecycle methods

  firebase: {
    'about_page': aboutPageRef
  }
}

</script>

<style>

</style>
