<template>

  <!-- Component content -->
  <div role="main" class="container">
    <div id="event_head" class="row">
      <div class="pull-left">
        <button @click="createEvent" :disabled="saving" class="btn btn-primary" type="button" name="button">Save</button>
      </div>
      <div class="pull-right">
        <button class="btn">Preview</button>
      </div>
    </div>
    <div class="row top_container">
      <div class="event_main">
        <div class="event_main_content">
          <input v-model="event.title" placeholder="Start by editing this title" class="event_main_content_title">
        </div>
      </div>
      <div class="event_bar">
        <div class="pull-left">
          <datepicker format="D MMM d" v-model="date" placeholder="When is it happening?"></datepicker>
          <vue-timepicker format="h:mm A" v-model="event.when.from" placeholder="From what time?"></vue-timepicker>
          <vue-timepicker format="h:mm A" v-model="event.when.to" placeholder="To what time?"></vue-timepicker>
        </div>
        <div class="pull-right">
          <input v-model="event.location.name" placeholder="Name the place e.g CCHub Building" style="width:100%">
          <places v-model="event.location.address" placeholder="Address of the place"></places>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="event_contributors_inner">
        <input @change="changeBackground" style="display:none" id='fopen' type='file' accept="image/jpeg,image/x-png,.png"/>
        <button @click="openFileDialog" class="btn btn-primary" type="button" name="button">Change Background</button>
        <textarea v-model="event.description" placeholder="Enter Event Description" style="height:200px"></textarea>
      </div>
    </div>
    <div class="row event_contributors_section">
      <div class="event_contributors_inner">
        <div class="event_contributors_content">
          <h3 class="text-center">Speakers</h3>
          <div v-for="(speaker, index) in event.speakers" class="speaker_content">
            <div class="icon">
              <img :src="speaker.profile_image" width="48" height="48">
            </div>
            <div class="inner">
              <a :href="speaker.twitterURL">{{speaker.name}}</a><button @click="removeSpeaker(index)" class="btn btn-xs btn-danger">X</button>
              <input v-model="speaker.topic" type="text" placeholder="Speaker topic" :style="{ width: '100%' }">
              <textarea v-model="speaker.description" placeholder="Description">

              </textarea>
            </div>
          </div>
          <add-contributor @add="addSpeaker"></add-contributor>
          <h3 class="text-center">Host</h3>
          <div v-for="(host, index) in event.hosts" class="host_content">
            <div class="icon">
              <img :src="host.profile_image" width="48" height="48">
            </div>
            <div class="inner">
              <a :href="host.twitterURL">{{host.name}}</a><button @click="removeHost(index)" class="btn btn-xs btn-danger">X</button>
              <textarea v-model="host.description" placeholder="Description">

              </textarea>
            </div>
          </div>
          <add-contributor @add="addHost"></add-contributor>
        </div>
      </div>
    </div>
  </div>
  <!-- /Component content -->

</template>

<script>
import firebase       from 'firebase';
import uniqid         from 'uniqid';
import Places         from 'vue-places';
import VueTimepicker  from 'vue2-timepicker';
import Datepicker     from 'vuejs-datepicker';
import AddContributor from './AddContributor.vue';

const db = firebase.app('AdminCreateApp').database();
const storage = firebase.storage();

const eventsRef = db.ref('events');
const eventImageRef = storage.ref('events');
export default {
  name: 'CreateEvent',
  //lifecycle methods

  components: {
    Places,
    Datepicker,
    VueTimepicker,
    AddContributor
  },
  data () {
    return this.initialState()
  },
  methods: {
    createEvent () {
      if(!this.tempBackground){
        alert("Please Change Background Image");
        return;
      }
      this.saving = true;
      this.setEventLatLng();
    },
    createEventPhase2 () {
      let slug = this.generateSlug(this.event.title);
      slug     = `${slug}-`;
      this.event.when.date = this.date.getTime();
      this.event.url_slug = uniqid(slug);

      let imageName = this.tempBackground.name;
      let imageRef  = eventImageRef.child(imageName);
      imageRef.put(this.tempBackground).then((snapshot) => {
        this.event.background_image_url = snapshot.downloadURL;
        console.log(this.event);
        eventsRef.push(this.event, (error) => {
          if(error){
            console.log(error);
            alert(`Issue creating event: ${error.message}`);
          }else{
            alert('Event successfully created');
            this.$data.event = this.initialState().event;
            this.$router.replace('/events');
          }
          this.saving = false;
        });
      });

    },
    addSpeaker (contributor) {
      this.event.speakers.push(contributor);
    },
    addHost (contributor) {
      this.event.hosts.push(contributor);
    },
    removeSpeaker (index) {
      this.event.speakers.splice(index, 1);
    },
    removeHost (index) {
      this.event.hosts.splice(index, 1);
    },
    setEventLatLng () {
      if(google){

        let geocoder = new google.maps.Geocoder()
        geocoder.geocode( { 'address': this.event.location.address}, (results, status) => {
          if (status == 'OK') {
            let location = results[0].geometry.location;
            this.event.location.lat = location.lat();
            this.event.location.lng = location.lng();
            this.createEventPhase2();
          } else {
            alert(`Geocode was not successful for the following reason: ${status} \n Please modify location `);
            this.saving = false;
          }
        });

      }else{
        alert("Geocoder not found. Unable to get location lat/lng");
        this.saving = false;
      }
    },
    changeBackground (e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;

      this.tempBackground = files[0];
      let reader = new FileReader();
      reader.readAsDataURL(files[0])
      reader.onload = (e => {
        console.log(e);
        let src = `url('${e.target.result}')`;
        $('.event_main').css('background-image', src);
      })
    },
    openFileDialog () {
      $('#fopen').trigger('click');
    },
    generateSlug (text) {
      return text.toString().toLowerCase().trim()
                  .replace(/\s+/g, '-')
                  .replace(/&/g, '-and-')
                  .replace(/[^\w\-]+/g, '')
                  .replace(/\-\-+/g, '-');
    },
    initialState () {
      return {
        saving: false,
        date: '',
        tempBackground: '',
        event: {
          title: '',
          published: false,
          url_slug: '',
          background_image_url: '/img/hero3.jpg',
          when: {
            date: '',
            from: {
              h: '',
              A: '',
              mm: ''
            },
            to: {
              h: '',
              A: '',
              mm: ''
            }
          },
          location: {
            name: '',
            address: '',
            lat: 0,
            lng: 0
          },
          description: '',
          hosts: [],
          speakers: [],
          attendees: []
        }
      }
    }
  }
}

</script>

<style>

textarea{
  font-size: 17px;
  line-height: 1.5;
  min-height: 60px;
  width: 99%;
  margin-left: -1px;
  border: solid 1px #c4c4c4;
  height: auto;
  border-radius: 3px;
  display: inline-block;
  padding: 6px 9px;
  color: #333333;
  cursor: pointer;
}

.top_container{
  position: relative;
}

.icon{
  width: 48px;
  height: 48px;
  float: left;
  margin-top: 5px;
  text-align: center;
  line-height: 48px;
  background-color: #efefef;
  border-radius: 5px;
  color: #999999;
}

.event_main{
  padding: 140px 0 240px;
  background-color: #7787a3;
  background-image: url(/img/hero3.jpg);
  background-size: cover;
  background-position: center;

}
.event_main::before {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      content: ' ';
      z-index: 1;
      background-color: rgba(32, 42, 59, 0.56);
  }

.event_main_content{
  position: relative;
  z-index: 2;
}
.event_main_content_title{
  display: inline-block;
  font-size: 3.10588em;
  line-height: 1.64706em;
  margin-bottom: 0.82353em;
  font-weight: 800;
  width: 100%;
  border: none;
  color: #fff;
  background-color: transparent;
  text-align: center;
}

.event_bar{
  position: absolute;
  bottom: 0;
  right: 0;
  left: 0;
  z-index: 2;
  background-color: rgba(32, 42, 60, 0.72)
}

.event_contributors_section{
  background-color: #f5faf9;
}

.event_contributors_inner{
  margin: auto;
  margin-top: 3.29412em;
  margin-bottom: 3.29412em;
  max-width: 40em;
  display: block;
}

.event_contributors_content{
  border: dotted rgba(0,0,0,0.2) 3px;
  overflow: hidden;
  padding: 20px;
  margin-bottom: 1.64706em;
  line-height: 2.5rem !important;
  border-radius: 3px;
}

.host_content{
  margin-bottom: 8px;
}

.speaker_content{
  margin-bottom: 8px;
}
</style>
