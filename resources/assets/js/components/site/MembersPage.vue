<template>
    <div>
      <!-- About Section -->
      <section class="about">
          <div class="container">
              <h1 class="about__title">forLoop Memebers</h1>
              <p class="about__content">
                {{members_page.description}}
              </p>
              <div class="section__form">
                  <form action="" class="form">
                      <div class="outer-container">
                          <div class="input-section position-relative">
                              <input type="text" class="form__input form__input--iconPresent" placeholder="Search for forLoop Members" />
                              <div class="input-section__icon position-absolute">
                                  <svg class="icon-ios-search-strong icon-md"><use xlink:href="img/icons.svg#icon-ios-search-strong"></use></svg>
                              </div>
                          </div>
                          <div class="submit-button">
                              <button type="submit" class="btn btn--primary btn--block">Search</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </section>

      <!-- Members Section -->
      <section class="members">
          <div class="container">
              <!-- Members List -->
              <div class="members__list">
                  <!-- Members List Item -->
                  <div @click="becomeMember" class="members__list__item add-member text-center">
                      <div class="members__item__container">
                          <div class="members__icon">
                              <svg class="icon-adduser icon-lg"><use xlink:href="img/icons.svg#icon-adduser"></use></svg>
                          </div>
                          <div class="members__text">Become a Member</div>
                      </div>
                  </div>
                  <!-- Members List Item -->
                  <div class="members__list__item text-center">
                      <div class="members__list__item__top">
                          <div class="members__avatar">
                              <img src="img/img1.png" alt="" class="img-circle" height="72" width="72">
                          </div>
                          <div class="members__name">Edgar Wilkins</div>
                          <div class="members__location">East Mauriceburgh</div>
                          <div class="members__social">
                              <a href="" class="members__social__item">
                                  <svg class="icon-social-github icon-md"><use xlink:href="img/icons.svg#icon-social-github"></use></svg>
                              </a>
                              <a href="" class="members__social__item">
                                  <svg class="icon-social-twitter icon-md"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                              </a>
                          </div>
                      </div>
                      <div class="members__list__item__bottom">
                          <div class="members__title">Front End Developer</div>
                          <div class="members__skilllist">HTML, CSS, Javascript, Design</div>
                      </div>
                  </div>

              </div>
          </div>
      </section>

      <add-subscriber></add-subscriber>
      <confirm-member-modal :show="show" :user="user"></confirm-member-modal>
    </div>
</template>


<script>
import firebase from 'firebase';
import AddSubscriber from './AddSubscriber.vue';
import ConfirmMemberModal from './ConfirmMemberModal.vue';

const membersPageRef = firebase.database().ref('members_page');
export default {
  name: 'MembersPage',
  components: {
    AddSubscriber,
    ConfirmMemberModal
  },

  data () {
    return {
      user: {},
      show: false
    }
  },
  firebase: {
    members_page: {
      source: membersPageRef,
      asObject: true
    }
  },
  methods: {
    becomeMember () {
      let provider = new firebase.auth.TwitterAuthProvider();
      provider.setCustomParameters({'screen_name':'forLoopNigeria'});
      firebase.auth().signInWithPopup(provider).then((result) =>{
        console.log(result)
        let photoUrl = result.user.photoURL.replace(/_normal/, "")
        this.user = {
            photoUrl: photoUrl,
            email: result.user.email,
            displayName: result.user.displayName,
            uid: result.user.uid
        };
        this.showConfirmDialog();
        console.log(this.user);
      }).catch(function(error) {
        console.log(error);
        alert(`Please try again: ${error.message}`);
      });
    },
    showConfirmDialog () {
      this.show = true;
    },
  }
}

</script>

<style>

</style>
