<template>

  <!-- Component content -->
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Events</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <div class="col-md-12">
                <table id="eventsTable" class="table table-striped table-bordered datatable">
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Component content -->

</template>

<script>
import firebase from 'firebase';

const db = firebase.database();
const eventsRef = db.ref('events');
export default {
  name: 'Events',
  //lifecycle methods
  mounted () {
    this.eventsTable = initEventsTable();

    //since we are using firebase Datatable would be Initialized
    //with no data at this point.
    //So we observe the firebase ref for new data and add to
    //datatable dynamically
    this.$firebaseRefs.events.on('child_added', (snapshot) => {
      let event = snapshot.val();
      let date  = new Date(event.when.date).toString('dddd MMM d yyyy');//custom format by datejs
      let from  = `${event.when.from.h}:${event.when.from.mm} ${event.when.from.A}`;
      let to    = `${event.when.to.h}:${event.when.to.mm} ${event.when.to.A}`;
      let when  = `${date} <br> ${from} - ${to}`;
      let location = `${event.location.name} <br> ${event.location.address}`;
      let attendees = event.attendees ? Object.keys(event.attendees).length : 0;
      this.eventsTable.row.add([
        event.title,
        when,
        location,
        attendees,
        'None'
      ]).draw();
    });

    //Todo remove from table when event is deleted
    this.$firebaseRefs.events.on('child_removed', (snapshot) => {
      console.log(snapshot.val());
    });
  },

  data () {
    return {
      eventsTable: {}
    }
  },
  firebase: {
    events: eventsRef
  }
}

function initEventsTable() {
  return $('#eventsTable').DataTable({
    data: [],
    columns: [
      { title: "Title" },
      { title: "Date" },
      { title: "Location" },
      { title: "Attendees" },
      { title: "Action" }
    ]
  });
}

</script>

<style>

</style>
