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

const props = defineProps({
  lat: {
    type: String,
    required: true
  },
  long: {
    type: String,
    required: true
  }});

const markers = [
  { lng: (props.long), lat: (props.lat), color: '#0000FF' },
];



onMounted(() => {
  config.apiKey = 'Bz939GMBh1SFnqLzUeE3';

  const initialState = { lng: (props.long), lat: (props.lat), zoom: 8 };
  

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

  width: 100%;
  height: 100vh;

  padding: 0%;

}

.map {

  width: 100%;
  height: 100%;
  margin: 0;
}
</style>