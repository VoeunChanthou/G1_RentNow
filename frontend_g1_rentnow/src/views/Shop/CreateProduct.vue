<template>
  <div>
    <input type="file" @change="previewImage" accept="image/*">
    <img :src="imageData" alt="Converted Image" v-if="imageData">
  </div>
</template>

<script>
export default {
  data() {
    return {
      imageData: null
    }
  },
  methods: {
    previewImage(event) {
      const file = event.target.files[0];
      this.convertImageToBase64(file);
    },
    convertImageToBase64(file) {
      const reader = new FileReader();
      reader.onloadend = () => {
        this.imageData = reader.result;
      };
      reader.readAsDataURL(file);
    }
  }
};
</script>