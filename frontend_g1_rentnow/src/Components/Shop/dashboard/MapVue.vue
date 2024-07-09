<template>
  <div class="map-container">
    <div ref="mapContainer" class="map"></div>
  </div>
</template>

<script>
import { Map, Marker } from 'maplibre-gl';
import { onMounted, onUnmounted, ref } from 'vue';

export default {
  name: 'CambodiaMap',
  setup() {
    const mapContainer = ref(null);
    let map = null;
    let marker = null;

    onMounted(() => {
      initMap();
    });

    onUnmounted(() => {
      if (map) {
        map.remove();
      }
    });

    const initMap = () => {
      const apiKey = 'Bz939GMBh1SFnqLzUeE3';

      map = new Map({
        container: mapContainer.value,
        style: `https://api.maptiler.com/maps/streets-v2/style.json?key=${apiKey}`,
        center: [104.8920, 11.5464], // Angkor Wat, Cambodia
        zoom: 7,
      });

      addLocationMarker();
    };

    const addLocationMarker = () => {
      const angkorWat = [104.8920, 11.5464]; // Angkor Wat, Cambodia

      marker = new Marker({
        color: '#f44336', // Red marker
      })
        .setLngLat(angkorWat)
        .addTo(map);
    };

    return {
      mapContainer,
    };
  },
};
</script>

<style scoped>
.map-container {
  width: 100%;
  height: 500px;
}

.map {
  width: 100%;
  height: 100%;
}
</style>