<template>
    <!-- Jumbotron -->
    <section class="jumbotron">
        <div class="container">
            <h2 class="jumbotron__title jumbotron__title--2">Get notified about Upcoming Meetups</h2>
            <transition name="custom-leave" leave-active-class="animated bounceOutRight">
            <div v-if="!hasSubscribed" class="jumbotron__action jumbotron__action--maxsize">
                <form v-on:submit.prevent="addSubscriber" class="form">
                    <div class="outer-container">
                        <div class="input-section">
                            <input v-model="subscriber" type="email" class="form__input" placeholder="Email Address" required/>
                        </div>
                        <div class="submit-button">
                            <button type="submit" class="btn btn--primary btn--block">Notify Me</button>
                        </div>
                    </div>
                </form>
            </div>
          </transition>
            <transition name="custom-enter" enter-active-class="animated tada">
            <div v-if="hasSubscribed" class="jumbotron__action jumbotron__action--maxsize">
                <h2>Thank you for subscribing</h2>
            </div>
          </transition>
        </div>
    </section>
</template>


<script>
import firebase from 'firebase';

const subscribersRef = firebase.database().ref('subscribers');
export default {
  name: 'AddSubscriber',
  data () {
    return {
      subscriber: '',
      hasSubscribed: false
    }
  },
  methods: {
    addSubscriber (e) {
      subscribersRef.push(this.subscriber);
      this.hasSubscribed = true;
    }
  }
}

</script>

<style>

</style>
