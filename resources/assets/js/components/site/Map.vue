<template>
  <!-- Venue Location on the Map -->
  <section class="venue">
      <div class="venue__map" id="map"></div>
      <div class="venue__tool">
          <div class="container">
              <div class="venue__info-cell">
                  <div class="venue__info-cell__icon">
                      <svg class="icon-pin icon-md"><use xlink:href="/img/icons.svg#icon-pin"></use></svg>
                  </div>
                  <p class="venue__info-cell__content">{{ location.name}} {{ location.address }}</p>
              </div>
          </div>
      </div>
  </section>
</template>


<script>

export default {
  name: 'Gmap',
  props: ['location'],
  mounted () {
    var location = {lat: this.location.lat, lng: this.location.lng};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: location
    });
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }
}

</script>

<style>

</style>
