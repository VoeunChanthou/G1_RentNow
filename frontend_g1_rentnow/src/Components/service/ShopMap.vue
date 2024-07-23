<template>
    <div class="map-wrap">
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
  
  onMounted(() => {
    config.apiKey = 'Bz939GMBh1SFnqLzUeE3';
  
    const initialState = { lng: (props.long), lat: (props.lat), zoom: 14 };
  
    map.value = markRaw(
      new Map({
        container: mapContainer.value,
        style: MapStyle.STREETS,
        center: [initialState.lng, initialState.lat],
        zoom: initialState.zoom
      })
    );
  
    new Marker({ color: '#FF0000' })
      .setLngLat([initialState.lng, initialState.lat])
      .addTo(map.value);
  });
  
  onUnmounted(() => {
    map.value?.remove();
  });
  </script>
  
  
  <style scoped>
  .map-wrap {
    /* position: relative; */
    width: 100%;
    height: 100%;
  
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