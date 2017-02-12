<template>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Subscribers</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <ol>
            <li v-for="subscriber in subscribers">
              {{subscriber['.value']}}
            </li>
            <li v-if="!subscribers">No Subscribers</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

</template>


<script>
import firebase from 'firebase';

const subscribersRef = firebase.database().ref('subscribers');
export default {
  name: 'Subscribers',
  data () {
    return {
    }
  },
  firebase: {
    subscribers: subscribersRef
  }
}

</script>

<style>

</style>
