<template>
  <div class="map-wrap mt-4">
    <div class="map" ref="mapContainer"></div>
  </div>
</template>

<script setup>
import { Map, MapStyle, Marker, config } from '@maptiler/sdk';
import { shallowRef, onMounted, onUnmounted, markRaw } from 'vue';
import '@maptiler/sdk/dist/maptiler-sdk.css';

const mapContainer = shallowRef(null);
const map = shallowRef(null);

const markers = [
  { lng: 104.901151, lat: 11.557119, color: '#FF0000' },
  { lng: 104.920249, lat: 12.659354, color: '#00FF00' },
  { lng: 104.920151, lat: 11.577119, color: '#0000FF' },
];

onMounted(() => {
  config.apiKey = 'Bz939GMBh1SFnqLzUeE3';

  const initialState = { lng: 104.910151, lat: 11.567119, zoom: 8 };

  map.value = markRaw(
    new Map({
      container: mapContainer.value,
      style: MapStyle.STREETS,
      center: [initialState.lng, initialState.lat],
      zoom: initialState.zoom
    })
  );

  markers.forEach(({ lng, lat, color }) => {
    new Marker({ color })
      .setLngLat([lng, lat])
      .addTo(map.value);
  });
});

onUnmounted(() => {
  map.value?.remove();
});
</script>

<style scoped>
.map-wrap {
  /* position: relative; */
  width: 100%;
  height: 100vh;

  padding: 0%;
  /* height: calc(100vh - 77px); calculate height of the screen minus the heading */
}

.map {
  /* position: absolute; */
  width: 100%;
  height: 100%;
  margin: 0;
}
</style>