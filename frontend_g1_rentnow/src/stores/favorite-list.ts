import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';

export const userFavoriteStore = defineStore('favorite', {
  state: () => ({
    favorite: []
  }),
  actions: {
    async fetchFavorite() {
      try {
        const response = await axiosInstance.get('/favorites');
        this.favorite = response.data
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});
