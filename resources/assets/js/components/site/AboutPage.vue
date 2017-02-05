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

      <!-- Jumbotron -->
      <section class="jumbotron">
          <div class="container">
              <h2 class="jumbotron__title jumbotron__title--2">Get notified about Upcoming Meetups</h2>
              <div class="jumbotron__action jumbotron__action--maxsize">
                  <form action="" class="form">
                      <div class="outer-container">
                          <div class="input-section">
                              <input type="text" class="form__input" placeholder="Email Address" />
                          </div>
                          <div class="submit-button">
                              <button type="submit" class="btn btn--primary btn--block">Notify Me</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </section>
    </div>
</template>


<script>
import firebase from 'firebase';
import Slick from 'vue-slick';

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
    Slick
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
        autoplaySpeed: 2000
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
