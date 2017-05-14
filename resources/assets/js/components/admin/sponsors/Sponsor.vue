<template>

<div class="col-md-55">
  <div class="thumbnail">
    <div class="image view view-first">
      <img style="width: 100%; display: block;" :src="sponsor.image_url" alt="image" />
      <div class="mask">
        <p>{{ sponsor.name }}</p>
        <div class="tools tools-bottom">
          <a :href="sponsor.link" target="_blank"><i class="fa fa-link"></i></a>
          <a href="#"><i class="fa fa-pencil"></i></a>
          <a @click="removeSponsor(sponsor['.key'])"><i class="fa fa-times"></i></a>
        </div>
      </div>
    </div>
    <div class="caption">
      <p></p>
    </div>
  </div>
</div>

</template>

<script>
import firebase from 'firebase';
const db = firebase.database();
const sponsorsRef = db.ref('sponsors');
export default {
  name: 'Sponsor',
  //lifecycle methods

  props: [
    "sponsor"
  ],
  methods: {
    removeSponsor (key) {
      console.log(`Removing key: ${key}`);
      sponsorsRef.child(key).set(null);
    }
  }

}

</script>

<style>

</style>
