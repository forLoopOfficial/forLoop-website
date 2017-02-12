<template>
    <!-- Jumbotron -->
    <section class="jumbotron">
        <div class="container">
            <h2 class="jumbotron__title jumbotron__title--2">Get notified about Upcoming Meetups</h2>
            <div class="jumbotron__action jumbotron__action--maxsize">
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
      subscriber: ''
    }
  },
  methods: {
    addSubscriber (e) {
      subscribersRef.push(this.subscriber);
      alert("You have been subscribed")
    }
  }
}

</script>

<style>

</style>
