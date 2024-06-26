

import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';

export const useProductStore = defineStore('post', {
  state: () => ({
    product: [] as Array<{ id: number, name: string, created_at: string, updated_at: string}>
  }),
  actions: {
    async fetchProduct() {
      try {
        const response = await axiosInstance.get('/category');
        this.product = response.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});


