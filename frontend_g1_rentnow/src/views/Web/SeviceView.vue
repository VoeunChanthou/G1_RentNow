
<script setup lang="ts">

import { Icon } from '@iconify/vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import CategoryVue from '@/Components/service/CategoryVue.vue'
import CardVue from '@/Components/homepage/CardVue.vue'
import WebLoginVue from '@/Components/homepage/WebLogin.vue';
import PopupRegisterVue from '@/Components/homepage/PopupRegister.vue';
import FooterMenu from '@/Components/homepage/FooterMenu.vue';
import type { componentSizeMap } from 'element-plus';
import { ref } from 'vue';
import { useAuthStore } from '@/stores/auth-store.ts'
import { productStore, searchProductStore } from '@/stores/product-list.ts'
import {searchCateStore} from '@/stores/category-list'

const AuthUSer = useAuthStore()
const proList = productStore()
const search = searchProductStore()
const cateSeach = searchCateStore()

const products = proList.fetchProductStore()


const handleSomeEvent = (data: any) => {
const searchProduct = search.fetchSearchProductStore(data);
}

const cateData = ref(null);

const handleCateEvent = (data: any) => {
  cateData.value = data; // Store the data in the cateData variable
  const searchCate = cateSeach.fetchCateSearch(data);
};
const shopData = ref(null);

const handleShopEvent = (data: any) => {
  shopData.value = data; // Store the data in the cateData variable
};
const dayData = ref(null);

const handleDayEvent = (data: any) => {
  dayData.value = data; // Store the data in the cateData variable
};

</script>

<template>
  <WebLayout>
    <div
      class="px-5"
      style="
        height: 140vh;
        display: grid;
        grid-template-columns: 25% 74%;
        gap: 20px;
        padding-top: 10px;
        padding-bottom: 20px;
        background: #e8e7e7;
      "
    >

   
      <CategoryVue @someEvent="handleSomeEvent" @CateEvent="handleCateEvent" @ShopEvent="handleShopEvent" @DayEvent="handleDayEvent"></CategoryVue>

      <div style="height: 100%; display: grid; grid-template-rows: 10% 98%; gap: 20px;">
        <div class="top shadow p-3 px-5 rounded bg-white" style="display:flex; justify-content: space-between; align-items: center;">
          <h3>Result</h3>
          <div class="select-group">
            <el-select v-model="value" placeholder="Select" style="width: 200px;" size="large">
              <el-option-group  v-for="group in options" :key="group.label" :label="group.label">
                <el-option
                  v-for="item in group.options"
                  :key="item.value"
                  :label="item.label"
                  :value="item.value"
                />
              </el-option-group>
            </el-select>
          </div>
        </div>
       
        <div class="top shadow p-3 rounded form_Card" style="height: 90%; background: #f4f2f2;display: flex; flex-wrap: wrap; gap: 20px; overflow-y: scroll; z-index: 0;">
          <div v-for="product in search.productSearch.data" :key="product.id">
            <!-- <CardVue v-if="(dayData <= product.day && dayData != '' && cateData == '' && shopData == '')" :product="product"></CardVue> -->
            <CardVue v-if="(product.category.name == cateData && cateData != '')" :product="product"></CardVue>
            <CardVue v-if="(product.shop.name == shopData && shopData != '' && cateData == '')" :product="product"></CardVue>
            <CardVue v-if="(cateData == '' && shopData == '')" :product="product"></CardVue>
            <!-- <CardVue v-else :product="''" style="display: none;"></CardVue> -->
            <p v-else style="display: none; width: 0%;">hello</p>
          </div>
          <!-- <CardVue  v-for="product in search.productSearch.data" :key="product.id" :product="product"></CardVue> -->
        </div>
      </div>
    </div>

    <!-- login -->
    <WebLoginVue></WebLoginVue>

    <!-- register -->
    <PopupRegisterVue></PopupRegisterVue>
    
    <!-- footer -->
    <FooterMenu></FooterMenu>
  </WebLayout>

</template>

<style>

</style>