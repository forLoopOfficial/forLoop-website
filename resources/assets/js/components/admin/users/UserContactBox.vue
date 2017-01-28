<template>

  <!-- Component content -->
  <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
    <div class="well profile_view">
      <div class="col-sm-12">
        <h4 class="brief"><i>{{user.role}}</i></h4>
        <div class="left col-xs-7">
          <h2>{{user.first_name + ' ' + user.last_name}}</h2>
          <p><strong>About: </strong> {{user.about}} </p>
          <ul class="list-unstyled">
            <li><i class="fa fa-building"></i> TwitterHandle: @{{user.twitter_handle}} </li>
          </ul>
        </div>
        <div class="right col-xs-5 text-center">
          <img :src="user.photoURL" alt="" class="img-circle img-responsive">
        </div>
      </div>
      <div class="col-xs-12 bottom text-center">
        <div class="col-xs-12 col-sm-6 emphasis">
        </div>
        <div class="col-xs-12 col-sm-6 emphasis">
          <button type="button" class="btn btn-primary btn-xs">
            <i class="fa fa-user"> </i> View Profile
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- /Component content -->

</template>


<script>

export default {
  name: 'UserContactBox',

  props: ['user'],
}

</script>

<style>

</style>
