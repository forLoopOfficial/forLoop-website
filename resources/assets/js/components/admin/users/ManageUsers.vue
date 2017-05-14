<template>

  <!-- page content -->
  <div class="right_col" role="main">
    <router-view></router-view>
  </div>
  <!-- /page content -->

</template>


<script>

export default {
  name: 'ManageUsers',
  data () {
    return {
      notes: []
    }
  }
}

</script>

<style>

</style>
