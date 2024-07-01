import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
export const userHistory = defineStore('history', {
  state: () => ({
    histories: []
  }),
  actions: {
    async fetchhistory() {
      try {
        const response = await axiosInstance.get('/list/history', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        });
        this.histories = response.data
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});