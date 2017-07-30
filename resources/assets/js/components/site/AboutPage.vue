<template>
    <div>
      <!-- About Section -->
      <section class="about">
          <div class="container">
              <h1 class="about__title">About forLoop</h1>
              <p class="about__content">{{about_page.description}}</p>
          </div>
      </section>

      <!-- Images -->

      <section class="images__section">
          <!-- Grid container -->
          <div class="outer-container">
            <slick v-if="about_page.images" ref="slick" :options="slickOptions">
              <img v-for="image in about_page.images" :src="image.image_url" class="images__section__left hidden--xxs"/>
            </slick>
              <!-- <div class="images__section__left hidden--xxs" style="background-image: url('img/forloop-3.jpg')"></div>
              <div class="images__section__middle" style="background-image: url('img/forloop-4.jpg')"></div>
              <div class="images__section__right hidden--xs">
                  <div class="images__section__right__top" style="background-image: url('img/forloop-1.jpg')"></div>
                  <div class="images__section__right__bottom" style="background-image: url('img/forloop-5.jpg')"></div>
              </div> -->
          </div>
      </section>

      <add-subscriber></add-subscriber>
    </div>
</template>


<script>
import firebase from 'firebase';
import Slick from 'vue-slick';
import AddSubscriber from './AddSubscriber.vue';

const aboutPageRef = firebase.database().ref('about_page');
export default {
  name: 'AboutPage',
  mounted () {

    this.$firebaseRefs.about_page.child('images').on('child_added', (snapshot) => {
      if(this.$refs.slick)
        window.location.reload();
    });
  },

  components: {
    Slick,
    AddSubscriber
  },
  data () {
    return {
      slickOptions: {
        slidesToShow: 3,
        dots: true,
        infinite: true,
        speed: 300,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 3000
      },
    }
  },

  firebase: {
    'about_page': {
      source: aboutPageRef,
      asObject: true
    }
  }
}

</script>

<style>

</style>
