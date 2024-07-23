


import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { Shop } from '@element-plus/icons-vue';

export const productStore = defineStore('product', {
  state: () => ({
    // productList: [] as Array<{ id: number, name: string, price: number, days: number, category_id: number, shop_id: number, created_at: string, updated_at: string}>
    productList: [],
  }),
  actions: {
    async fetchProductStore() {
      try {
        const response = await axiosInstance.get('/product');
        this.productList = response.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});
export const searchProductStore = defineStore('search', {
  state: () => ({
    // productList: [] as Array<{ id: number, name: string, price: number, days: number, category_id: number, shop_id: number, created_at: string, updated_at: string}>
    productSearch: [],
  }),
  actions: {
    async fetchSearchProductStore(name:string) {
      try {
        const response = await axiosInstance.get(`/search?name=${name}`);
        this.productSearch = response.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});


export const CreateProductStore = defineStore('create', {
  state: () => ({
    // productList: [] as Array<{ id: number, name: string, price: number, days: number, category_id: number, shop_id: number, created_at: string, updated_at: string}>
    createProduct: [],
  }),
  actions: {
    async createProductShop(product:Object) {
      try {
        const response = await axiosInstance.post('/shop/create/product', product);
        console.log(response)
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});


export const getProductInShop = defineStore('shoppro', {
  state: () => ({
    // productList: [] as Array<{ id: number, name: string, price: number, days: number, category_id: number, shop_id: number, created_at: string, updated_at: string}>
    products: [],
  }),
  actions: {
    async fetchProductShop() {
      try {
        const response = await axiosInstance.get("/product/shop");
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});


