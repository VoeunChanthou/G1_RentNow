

import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';

export const useShopStore = defineStore('get', {
  state: () => ({
    shops: [] as Array<{ id: number, name: string, user_id: number, Country: string, Province: string, street: string, latitude: string, longitude: string, created_at: string, updated_at: string}>
  }),
  actions: {
    async fetchShop() {
      try {
        const response = await axiosInstance.get('/shop');
        this.shops = response.data;
      
        // this.shop = [{ id: 1, name: 'Product'}];
        // console.log('hello')
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});