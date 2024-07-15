


import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { Shop } from '@element-plus/icons-vue';

export const memberStore = defineStore('member', {
  state: () => ({
    // productList: [] as Array<{ id: number, name: string, price: number, days: number, category_id: number, shop_id: number, created_at: string, updated_at: string}>
    members: [],
  }),
  actions: {
    async fetchMemberStore() {
      try {
        const response = await axiosInstance.get('/members');
        this.members = response.data.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});