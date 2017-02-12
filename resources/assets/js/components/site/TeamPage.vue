<template>
    <div>
      <!-- About Section -->
      <section class="about">
          <div class="container">
              <h1 class="about__title">The forLoop Team</h1>
              <p class="about__content">
                {{team_page.description}}
              </p>
          </div>
      </section>

      <!-- Teams Section -->
      <section class="teams">
          <div class="team__list">
              <!-- Teams List Item -->
              <div class="team__list__item position-relative" style="background-image: url('img/1.png')">
                  <div class="team__list__item__container">
                      <div class="team__list__item__name">Imogie Mubarak</div>
                      <div class="team__list__item__handle">
                          <div class="handle__icon">
                              <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                          </div>
                          <div class="handle__text">@imogiemubarak</div>
                      </div>
                  </div>
              </div>
              <!-- Teams List Item -->
              <div v-for="member in team_page.members" class="team__list__item position-relative" :style="{ backgroundImage: 'url(\''+member.profile_image+'\')'}">
                  <div class="team__list__item__container">
                      <div class="team__list__item__name">{{member.name}}</div>
                      <div class="team__list__item__handle">
                          <div class="handle__icon">
                              <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                          </div>
                          <div class="handle__text">@{{member.twitter_handle}}</div>
                      </div>
                  </div>
              </div>
          </div>
      </section>


      <add-subscriber></add-subscriber>
    </div>
</template>


<script>
import firebase from 'firebase';
import AddSubscriber from './AddSubscriber.vue';

const teamPageRef = firebase.database().ref('team_page');
export default {
  name: 'TeamPage',
  components: {
    AddSubscriber
  },

  firebase: {
    team_page: {
      source: teamPageRef,
      asObject: true
    }
  }
}

</script>

<style>

</style>
