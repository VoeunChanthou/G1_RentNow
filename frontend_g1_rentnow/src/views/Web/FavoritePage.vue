
<script setup lang="ts">

import { Icon } from '@iconify/vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import WebLoginVue from '@/Components/homepage/WebLogin.vue';
import PopupRegisterVue from '@/Components/homepage/PopupRegister.vue';
import CardVue from '@/Components/favorite/favoriteComponent.vue'

import type { componentSizeMap } from 'element-plus';
import { ref } from 'vue';
import { useAuthStore } from '@/stores/auth-store.ts'
import { userFavoriteStore } from '@/stores/favorite-list';


const AuthUSer = useAuthStore()

const favoriteStore = userFavoriteStore()


const favo = favoriteStore.fetchFavorite();



</script>

<template>
  <!-- {{ cateSeach.categoriesSeach.data }} -->
  <WebLayout>
    <div
      class="px-5"
      style="
        height: 100vh;
        display: grid;
        grid-template-columns: 25% 74%;
        gap: 20px;
        padding-top: 10px;
        padding-bottom: 20px;
        background: #f4f2f2;
      "
    >

   
    <div class="search-bar shadow p-5 mb-5 bg-white rounded" style="height: 82%;display: flex; justify-content: end;">
        <div class="right" style="width: 80%; height: 60vh; display: flex; flex-direction: column;">
            <span style="font-size: 23px; font-weight: bold;"> favorite</span>
            <span style="font-size: 23px; font-weight: bold;"> favorite</span>
            <span style="font-size: 23px; font-weight: bold;"> favorite</span>
            <span style="font-size: 23px; font-weight: bold;"> favorite</span>
        </div>
    
  </div>

      <div style="height: 100%; display: grid; grid-template-rows: 80px 100vh;">
        <div class="top shadow p-3 px-5 rounded bg-white" style="display:flex; justify-content: center; align-items: center;">
          <h3>My Favorites</h3>
        </div>
       
        <div class="top shadow p-3 rounded form_Card" style="height: 80%; background: #f4f2f2;display: flex; flex-wrap: wrap; gap: 20px; overflow-y: scroll;">
          <div v-for="favorite in favoriteStore.favorite.data" :key="favorite.id">
            <CardVue :product="favorite.product_id" :id="favorite.id" />
          </div>
        </div>
      </div>
    </div>

    <!-- login -->
    <WebLoginVue></WebLoginVue>

    <!-- register -->
    <PopupRegisterVue></PopupRegisterVue>
  </WebLayout>

</template>

<style>

</style>