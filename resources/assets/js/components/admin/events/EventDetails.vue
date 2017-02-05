<template>

  <!-- page content -->
  <div>
    <h1>Event Details</h1>
    <div v-if="event" class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{ event.title }}</h2>
            <!-- <button type="button" name="button" @click="openAddSponsorModal">Add Sponsor</button> -->
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
              <div class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input v-model="event.title" type="text" id="title" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="published">Published</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input v-model="event.published" type="checkbox" id="published" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Date</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <datepicker format="D MMM d yyyy" v-model="eventTime" placeholder="When is it happening?" inputClass="form-control"></datepicker>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Time Range</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <vue-timepicker format="h:mm A" v-model="event.when.from" placeholder="From what time?"></vue-timepicker>
                    <vue-timepicker format="h:mm A" v-model="event.when.to" placeholder="To what time?"></vue-timepicker>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Location</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="col-md-6">
                      <input v-model="event.location.name" placeholder="Name the place e.g CCHub Building" style="width:100%" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <places v-model="event.location.address" placeholder="Address of the place" class="form-control"></places>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea v-model="event.description" placeholder="Enter Event Description" style="height:200px"></textarea>
                  </div>
                </div>

                <div class="event_contributors_content">
                  <h3 class="text-center">Speakers</h3>
                  <div v-for="speaker in event.speakers" class="speaker_content">
                    <div class="icon">
                      <img :src="speaker.profile_image">
                    </div>
                    <div class="inner">
                      <a :href="speaker.twitterURL">{{speaker.name}}</a>
                      <input v-model="speaker.topic" type="text" placeholder="Speaker topic" :style="{ width: '100%' }">
                      <textarea v-model="speaker.description" placeholder="Description">

                      </textarea>
                    </div>
                  </div>
                  <add-contributor @add="addSpeaker"></add-contributor>
                  <h3 class="text-center">Host</h3>
                  <div v-for="host in event.hosts" class="host_content">
                    <div class="icon">
                      <img :src="host.profile_image">
                    </div>
                    <div class="inner">
                      <a :href="host.twitterURL">{{host.name}}</a>
                      <textarea v-model="host.description" placeholder="Description">

                      </textarea>
                    </div>
                  </div>
                  <add-contributor @add="addHost"></add-contributor>
                </div>
                <div class="form-group">
                  <button @click="updateEvent" :disabled="updating" class="btn btn-primary" type="button" name="button">Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

</template>

<script>
import firebase from 'firebase';
import Places         from 'vue-places';
import VueTimepicker  from 'vue2-timepicker';
import Datepicker     from 'vuejs-datepicker';
import AddContributor from './AddContributor.vue';

const db = firebase.database();
export default {
  name: 'EventDetails',
  //lifecycle methods
  beforeRouteEnter: (to, from, next) => {
    let slug = to.params.slug;
    getEvent(slug).once('value').then(snapshot => {
      let val = snapshot.val();
      if(val){
        let key   = Object.keys(val)[0]; //Dont know the key to the object - hack
        let event = val[key];
        event.id = key;
        next(vm => { vm.setEvent(event);});
      }
      else
        next({path: '/events'});
    });
  },
  beforeRouteUpdate: (to, from, next) => {
    this.event = null;
    let slug = to.params.slug;
    getEvent(slug).once('value').then(snapshot => {
      let val = snapshot.val();
      if(val){
        let key   = Object.keys(val)[0]; //Dont know the key to the object - hack
        let event = val[key];
        event.id = key;
        this.setEvent(event);
        next();
      }
      else
        next({path: '/events'});
    });
  },

  data () {
    return {
      updating: false,
      event: null
    }
  },
  components: {
    Places,
    VueTimepicker,
    Datepicker,
    AddContributor
  },

  methods: {
    setEvent (event) {
      this.event = event;
    },
    setEventLatLng () {
      if(google){

        let geocoder = new google.maps.Geocoder()
        geocoder.geocode( { 'address': this.event.location.address}, (results, status) => {
          if (status == 'OK') {
            let location = results[0].geometry.location;
            this.event.location.lat = location.lat();
            this.event.location.lng = location.lng();
            this.updateEventPhase2();
          } else {
            alert(`Geocode was not successful for the following reason: ${status} \n Please modify location `);
            this.updating = false;
          }
        });

      }else{
        alert("Geocoder not found. Unable to get location lat/lng");
        this.updating = false;
      }
    },
    addSpeaker (contributor) {
      this.event.speakers.push(contributor);
    },
    addHost (contributor) {
      this.event.hosts.push(contributor);
    },
    updateEvent () {
      this.updating = true;
      this.setEventLatLng();
    },
    updateEventPhase2 () {
      let eventsRef = db.ref(`events/${this.event.id}`);
      eventsRef.update(this.event, (error) => {
        if(error){
          console.log(error);
          alert(`Issue creating event: ${error.message}`);
        }else{
          alert('Event successfully created');
        }
        this.saving = false;
      });
    }
  },

  computed: {
    eventTime: {
      // getter
      get: function () {
        return new Date(this.event.when.date);
      },
      // setter
      set: function (newDate) {
        this.event.when.date = newDate.getTime();
      }
    },
  }
}

function getEvent (slug) {
  return db.ref('events').orderByChild('url_slug').startAt(slug).endAt(slug)
                    .limitToFirst(1);
}


</script>

<style>

</style>
