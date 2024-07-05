<template>
  <div>
    <h1>Create Product</h1>
    <form @submit.prevent="createProduct">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="name" required>
      </div>
      <div>
        <label for="image">Image:</label>
        <input type="file" id="image" @change="onImageChange" required>
      </div>
      <button type="submit">Create</button>
    </form>
  </div>
</template>

<script>
import axiosInstance from '@/plugins/axios';


export default {
  data() {
    return {
      name: '',
      image: null
    }
  },
  methods: {
    onImageChange(event) {
      this.image = event.target.files[0];
    },
    createProduct() {
      const formData = new FormData();
      formData.append('name', this.name);
      formData.append('image', this.image);

      axiosInstance.post('/create/product', formData)
        .then(response => {
          console.log(response.data);
          this.name = '';
          this.image = null;
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
}
</script>