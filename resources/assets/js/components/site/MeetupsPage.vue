<template>
    <div>
      <!-- Hero -->
      <section class="hero hero--2">
          <div class="container">
              <h1 class="hero__title hero__title--2 text-center">Find a Meetup</h1>
          </div>
      </section>

      <div class="tab__section">
          <!-- tabs -->
          <div class="tab-nav">
              <div class="tab-nav__item active">
                  <a href="#upcomingMeetups" role="tab" data-toggle="tab" class="tab-nav__link">Upcoming Meetups</a>
              </div>
              <div class="tab-nav__item">
                  <a href="#archivedMeetups" role="tab" data-toggle="tab" class="tab-nav__link">Archived Meetups</a>
              </div>
          </div>


          <div class="container">
              <!-- Tab contents -->
              <div class="tab-content">
                  <!-- Upcoming Meetups -->
                  <div id="upcomingMeetups" class="tab-content__item active">

                      <div class="outer-container">
                          <!-- Meeting Item -->
                          <div v-for="upcomingEvent in upcomingEvents" class="meeting__item">
                              <div class="meeting__item__content">
                                  <div class="meeting__item__content__top">
                                      <router-link :to="{ name: 'event', params: { slug: upcomingEvent.url_slug }}" class="meeting__item__title">{{ upcomingEvent.title }}</router-link>
                                      <p class="meeting__item__location">{{ upcomingEvent.location.name }}</p>
                                      <p class="meeting__item__date">{{ upcomingEvent.when.date | dateFormat }}</p>
                                  </div>

                                  <div v-if="upcomingEvent.hosts" class="meeting__item__host">
                                      <div class="meeting__item__host__avatar">
                                          <img :src="upcomingEvent.hosts[0].profile_image" alt="" class="img-circle inline-block" width="40" height="40">
                                      </div>
                                      <div class="meeting__item__host__caption">Hosted by {{ upcomingEvent.hosts[0].name }}</div>
                                  </div>
                              </div>
                              <a href="" class="meeting__item__resource">
                                  <span class="meeting__item__resource__text">Add to Calendar</span>
                                  <span class="meeting__item__resource__icon">
                                      <svg class="icon-calendar-o icon-ss"><use xlink:href="img/icons.svg#icon-calendar-o"></use></svg>
                                  </span>
                              </a>
                          </div>
                          <!-- Add new meetup -->
                          <div class="meeting__item meeting__item--dashed">
                              <div class="meeting__item__add text-center">
                                  <div class="meeting__item__icon">
                                      <svg class="icon-plus"><use xlink:href="img/icons.svg#icon-plus"></use></svg>
                                  </div>
                                  <div class="meeting__item__caption">Organize a Meetup</div>
                              </div>
                          </div>
                      </div>

                  </div>
                  <!-- Archived Meetups -->
                  <div id="archivedMeetups" class="tab-content__item">

                      <div class="outer-container">
                          <!-- Meeting Item -->
                          <div v-for="archivedEvent in archivedEvents" class="meeting__item">
                              <div class="meeting__item__content">
                                  <div class="meeting__item__content__top">
                                      <router-link :to="{ name: 'event', params: { slug: archivedEvent.url_slug }}" class="meeting__item__title">{{ archivedEvent.title }}</router-link>
                                      <p class="meeting__item__location">{{ archivedEvent.location.name }}</p>
                                      <p class="meeting__item__date">{{ archivedEvent.when.date | dateFormat }}</p>
                                  </div>

                                  <div v-if="upcomingEvent.hosts" class="meeting__item__host">
                                      <div class="meeting__item__host__avatar">
                                          <img :src="archivedEvent.hosts[0].profile_image" alt="" class="img-circle inline-block" width="40" height="40">
                                      </div>
                                      <div class="meeting__item__host__caption">Hosted by {{ archivedEvent.hosts[0].name }}</div>
                                  </div>
                              </div>
                              <a v-if="archivedEvent.resourceUrl" :href="archivedEvent.resourceUrl" class="meeting__item__resource" target="_blank">
                                  <span class="meeting__item__resource__text">Download Resources</span>
                                  <span class="meeting__item__resource__icon">
                                      <svg class="icon-downloads icon-ss"><use xlink:href="img/icons.svg#icon-downloads"></use></svg>
                                  </span>
                              </a>
                              <a v-else class="meeting__item__resource" href="#">
                                  <span class="meeting__item__resource__text">No Resource</span>
                                  <span class="meeting__item__resource__icon">
                                      <svg class="icon-downloads icon-ss"><use xlink:href="img/icons.svg#icon-downloads"></use></svg>
                                  </span>
                              </a>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>

      <add-subscriber></add-subscriber>
    </div>
</template>


<script>
import firebase from 'firebase';
import AddSubscriber from './AddSubscriber.vue';

const today     = new Date().getTime();
export default {
  name: 'MeetupsPage',
  components: {
    AddSubscriber
  },
  beforeCreate() {
    let queries = [
      {
        indexName: "events",
        query: "",
        params: {
          filters: `published:true AND when.date >= ${today}`
        }
      },
      {
        indexName: "events",
        query: "",
        params: {
          filters: `published:true AND when.date < ${today}`
        }
      }
    ];
    algoliaClient.search(queries).then((results) => {
      this.upcomingEvents = results.results[0].hits;
      this.archivedEvents = results.results[1].hits;
    })
    .catch(err => {
      console.log(err)
    })
  },
  data() {
    return {
      upcomingEvents: [],
      archivedEvents: []
    }
  }
}

</script>

<style>

</style>
