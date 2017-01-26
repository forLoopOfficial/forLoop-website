<template>
    <div>
      <div class="hero__container">
          <!-- Hero -->
          <section class="hero hero--3">
              <div class="container">
                  <!-- Hero Content -->
                  <div class="hero__content">
                      <h1 class="hero__title text-center">LARAVEL & THE REAL WORLD</h1>
                  </div>
              </div>
          </section>
          <!-- Hero Event details content -->
          <div class="hero__absolute">
              <div class="hero__absolute__container">
                  <div class="hero__event">
                      <!-- Hero Event details item -->
                      <div class="hero__event__item">
                          <!-- Hero Event details content icon -->
                          <div class="hero__event__item__icon">
                              <svg class="icon-calendar"><use xlink:href="img/icons.svg#icon-calendar"></use></svg>
                          </div>
                          <!-- Hero Event details content content -->
                          <div class="hero__event__item__content">
                              <!-- Hero Event date -->
                              <p class="hero__event__item__content__text">Friday Nov 4</p>
                              <!-- Hero Event time -->
                              <p class="hero__event__item__content__text">1:00 PM - 3:00PM</p>
                          </div>
                      </div>
                      <!-- Hero Event details item -->
                      <div class="hero__event__item">
                          <!-- Hero Event details content icon -->
                          <div class="hero__event__item__icon">
                              <svg class="icon-pin"><use xlink:href="img/icons.svg#icon-pin"></use></svg>
                          </div>
                          <!-- Hero Event details content content -->
                          <div class="hero__event__item__content">
                              <!-- Hero Event Venue -->
                              <p class="hero__event__item__content__text">CCHub Building</p>
                              <!-- Hero Event Venue location -->
                              <p class="hero__event__item__content__text">Yaba, Lagos</p>
                          </div>
                      </div>
                      <!-- Hero Event details item -->
                      <div class="hero__event__item">
                          <!-- Hero Event details content icon -->
                          <div class="hero__event__item__icon">
                              <svg class="icon-capacity-icon"><use xlink:href="img/icons.svg#icon-capacity-icon"></use></svg>
                          </div>
                          <!-- Hero Event details content content -->
                          <div class="hero__event__item__content">
                              <!-- Hero Event attendees -->
                              <p class="hero__event__item__content__text">24 Attandees</p>
                              <!-- Hero Event attendees link -->
                              <a class="hero__event__item__content__text">View All</a>
                          </div>
                      </div>
                      <!-- Hero Event details item -->
                      <div class="hero__event__item hero__event__item--margin-10 mobile-float">
                          <!-- Become an attendee link -->
                          <button class="btn btn--primary btn--flex btn--sm--100">
                              <span class="btn--icon">
                                  <svg class="icon-add icon-md"><use xlink:href="img/icons.svg#icon-add"></use></svg>
                              </span>
                              <span class="btn--text">I Want To Attend</span>
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Section -->
      <section class="reasons">
          <div class="container">
              <h2 class="section__title section__title--2">LARAVEL & THE REAL WORLD</h2>
              <p class="section__caption">Last month, my wife, Anne Doe, took me to Las Vegas because she had to go for a business convention. Needless to say, she writes for an guide to casinos and I hate gambling. But then, she likes it and this supports us too, so I went along without any.</p>
          </div>
      </section>


      <!-- that line -->
      <div class="line">
          <div class="container">
              <hr class="line--seperator" />
          </div>
      </div>

      <!-- Host Information -->
      <section class="info">
          <div class="container">
              <div class="info__title text-center">HOST</div>
              <!-- Host Information item -->
              <div class="info__item">
                  <div class="info__item__left">
                      <!-- Host Information user's avatar -->
                      <div class="info__item__avatar">
                          <img src="img/img2.png" alt="" class="img-circle img-block" height="98" width="98">
                      </div>
                      <div class="info__item__content">
                          <!-- Host Information user's name -->
                          <div class="info__item__content__name">Lulu Obrien</div>
                          <!-- Host Information user's other information -->
                          <div class="info__item__content__detail">Front End Developer, Andela</div>
                      </div>
                  </div>
                  <div class="info__item__right">
                      <button class="btn btn--flex btn--primary">
                          <span class="btn--icon">
                              <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                          </span>
                          <span class="btn--text">Follow</span>
                      </button>
                  </div>
              </div>
          </div>
      </section>

      <!-- Speakers Information -->
      <section class="info">
          <div class="container">
              <div class="info__title text-center">SPEAKERS</div>
              <!-- Host Information item -->
              <div class="info__item">
                  <div class="info__item__left">
                      <!-- Host Information user's avatar -->
                      <div class="info__item__avatar">
                          <img src="img/img4.png" alt="" class="img-circle img-block" height="98" width="98">
                      </div>
                      <div class="info__item__content">
                          <!-- Host Information user's name -->
                          <div class="info__item__content__name">Brian Greene</div>
                          <!-- Host Information user's other information -->
                          <div class="info__item__content__detail">Front End Developer, Andela</div>
                          <div class="info__item__content__topic">Speaking on: <span class="talk-topic">LARAVEL & THE REAL WORLD</span></div>
                      </div>
                  </div>
                  <div class="info__item__right">
                      <button class="btn btn--flex btn--primary">
                          <span class="btn--icon">
                              <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                          </span>
                          <span class="btn--text">Follow</span>
                      </button>
                  </div>
              </div>
              <!-- Host Information item -->
              <div class="info__item">
                  <div class="info__item__left">
                      <!-- Host Information user's avatar -->
                      <div class="info__item__avatar">
                          <img src="img/img1.png" alt="" class="img-circle img-block" height="98" width="98">
                      </div>
                      <div class="info__item__content">
                          <!-- Host Information user's name -->
                          <div class="info__item__content__name">Cynthia Garner</div>
                          <!-- Host Information user's other information -->
                          <div class="info__item__content__detail">Javascript Ninja, Hotels.ng</div>
                          <div class="info__item__content__topic">Speaking on: <span class="talk-topic">UPGRADING YOUR COMPOSER LIBRARIES</span></div>
                      </div>
                  </div>
                  <div class="info__item__right">
                      <button class="btn btn--flex btn--primary">
                          <span class="btn--icon">
                              <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                          </span>
                          <span class="btn--text">Follow</span>
                      </button>
                  </div>
              </div>
              <!-- Host Information item -->
              <div class="info__item">
                  <div class="info__item__left">
                      <!-- Host Information user's avatar -->
                      <div class="info__item__avatar">
                          <img src="img/img5.png" alt="" class="img-circle img-block" height="98" width="98">
                      </div>
                      <div class="info__item__content">
                          <!-- Host Information user's name -->
                          <div class="info__item__content__name">Brandon Waters</div>
                          <!-- Host Information user's other information -->
                          <div class="info__item__content__detail">Front End Developer, Andela</div>
                          <div class="info__item__content__topic">Speaking on: <span class="talk-topic">CHOOSING THE RIGHT FRONT END FRAMEWORKS</span></div>
                      </div>
                  </div>
                  <div class="info__item__right">
                      <button class="btn btn--flex btn--primary">
                          <span class="btn--icon">
                              <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                          </span>
                          <span class="btn--text">Follow</span>
                      </button>
                  </div>
              </div>
          </div>
      </section>

      <!-- Attendees Information -->
      <section class="info info--2">
          <div class="container">
              <div class="info__title text-center">24 PEOPLE ARE ATTENDING</div>
              <!-- Attendee list -->
              <div class="info__list">
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img1.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img2.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img3.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img4.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img5.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img1.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img2.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img3.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img4.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img5.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img1.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img2.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img3.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img4.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
                  <!-- Attendee list -->
                  <div class="info__list__item">
                      <img src="img/img5.png" alt="" class="img-circle img-block" height="90" width="90">
                  </div>
              </div>

              <div class="show-more text-center">
                  <button class="btn btn--primary">Show More</button>
              </div>
          </div>
      </section>

      <!-- Venue Location on the Map -->
      <section class="venue">
          <div class="venue__map" style="background-image:url('https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&size=640x370&scale=2&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Clabel:C%7C40.718217,-73.998284')"></div>
          <div class="venue__tool">
              <div class="container">
                  <div class="venue__info-cell">
                      <div class="venue__info-cell__icon">
                          <svg class="icon-pin icon-md"><use xlink:href="img/icons.svg#icon-pin"></use></svg>
                      </div>
                      <p class="venue__info-cell__content">Front Wing, First Floor, 19, Town Planning Way, Ilupeju. Lagos, Nigeria </p>
                  </div>
              </div>
          </div>
      </section>
    </div>
</template>


<script>

export default {
  name: 'EventPage'
}

</script>

<style>

</style>
