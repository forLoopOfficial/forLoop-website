<template>
    <div>
      <!-- About Section -->
      <section class="about">
          <div class="container">
              <h1 class="about__title">About forLoop</h1>
              <p class="about__content">Last month, my wife, Anne Doe, took me to Las Vegas because she had to go for a business convention. Needless to say, she writes for an guide to casinos and I hate gambling. But then, she likes it and this supports us too, so I went along without any hassle. At first I was depressed, but then as I asked around and looked around, I ended up having more fun in Las Vegas than I would have thought. And no. I did not enter a single casino while I was there.</p>
          </div>
      </section>

      <!-- Images -->

      <section class="images__section">
          <!-- Grid container -->
          <div class="outer-container">
              <div class="images__section__left hidden--xxs" style="background-image: url('img/forloop-3.jpg')"></div>
              <div class="images__section__middle" style="background-image: url('img/forloop-4.jpg')"></div>
              <div class="images__section__right hidden--xs">
                  <div class="images__section__right__top" style="background-image: url('img/forloop-1.jpg')"></div>
                  <div class="images__section__right__bottom" style="background-image: url('img/forloop-5.jpg')"></div>
              </div>
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

export default {
  name: 'AboutPage'
}

</script>

<style>

</style>
