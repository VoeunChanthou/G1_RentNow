

import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';

export const useShopStore = defineStore('get', {
  state: () => ({
    shops: []
  }),
  actions: {
    async fetchShop() {
      try {
        const response = await axiosInstance.get('/shop');
        this.shops = response.data;
        // console.log(response.data)
      
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});


export const getShopStore = defineStore('id', {
  state: () => ({
    shop: [],
  }),
  actions: {
    async fetchShopSpecific(shopId: number) {
      try {
        const response = await axiosInstance.get(`/get/shop/${shopId}`);
        this.shop = response.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});

export const useShopDashboard = defineStore('dash', {
  state: () => ({
    shopInfo: [],
    product: Number,
    countMember: Number,
    myShop: [],
    members: [],
    borrows: [],
    countBorrow: 0,
    incom: 0,
  }),
  actions: {
    async fetchShopInfor() {
      try {
        const response = await axiosInstance.get('/product/shop');
        this.shopInfo = response.data;
        this.product = response.data.products.length;
        this.countMember = response.data.member.length;
        this.members = response.data.member;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    },
    async fetchBorrowShop() {
      try {
        const response = await axiosInstance.get('get/borrow/shop');
        this.borrows = response.data;
        console.log(response);
        this.countBorrow = response.data.length;
        for (let i = 0; i < this.borrows.length; i++) {
          this.incom += this.borrows[i].price
        }
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});

export const useMyshop = defineStore('my', {
  state: () => ({
    ownshop: []
  }),
  actions: {
    async fetchMyShop() {
      try {
        const response = await axiosInstance.get('/get/shop');
        this.ownshop = response.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});