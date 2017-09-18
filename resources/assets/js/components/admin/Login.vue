<template>
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form @submit.prevent="signInWithPassword()">
            <h1>Login Form</h1>
            <div>
              <input type="email" class="form-control" placeholder="Email" required v-model="email" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required v-model="password" />
            </div>
            <div>
              <input type="submit" class="btn btn-default submit" value="Log in"/>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> ForLoop Nigeria</h1>
                <p>©2016 All Rights Reserved. ForLoop Nigeria</p>
              </div>
            </div>
          </form>
        </section>
      </div>

    </div>
  </div>
</template>


<script>
import firebase from 'firebase';
export default {
  name: 'Login',
  //lifecycle methods
  created () {
    firebase.app('AdminApp').auth().signOut();
  },

  data () {
    return {
      email: '',
      password: ''
    }
  },
  methods: {
    signInWithPassword () {
      return firebase.app('AdminApp').auth().signInWithEmailAndPassword(this.email, this.password)
        .then((userData) => {
          this.onSignedIn()
          return userData
        })
        .catch((error) => {
          console.log(error)
          alert(error.message);
        }) // tell the user an error occurred
    },
    onSignedIn () {
      console.log('going home');
      this.$router.push({path: '/'})
    }
  }
}

</script>

<style>

</style>
