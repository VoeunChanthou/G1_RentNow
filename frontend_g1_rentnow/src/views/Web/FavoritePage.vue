
<script setup lang="ts">

import { Icon } from '@iconify/vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue';
import WebLoginVue from '@/Components/homepage/WebLogin.vue';
import PopupRegisterVue from '@/Components/homepage/PopupRegister.vue';
import CardVue from '@/Components/favorite/favoriteComponent.vue';
import SibarVue from '@/Components/favorite/SibarVue.vue';
import FooterMenuVue from '@/Components/homepage/FooterMenu.vue';

import type { componentSizeMap } from 'element-plus';
import { ref } from 'vue';
import { useAuthStore } from '@/stores/auth-store.ts'
import { userFavoriteStore } from '@/stores/favorite-list';
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'


const router = useRouter()
const AuthUSer = useAuthStore()
const favoriteStore = userFavoriteStore()
const favo = favoriteStore.fetchFavorite();

const onSubmit = (async () => {
  try {
    const { data } = await axiosInstance.post('/logout')
    localStorage.setItem('access_token', data.access_token)
    location.reload()
    router.push('/')
  } catch (error) {
    console.warn('Error')
  }
})

</script>

<template>
  <!-- {{ cateSeach.categoriesSeach.data }} -->
  <WebLayout>
    <div class="px-5" style=" height: auto; display: grid; grid-template-columns: 25% 74%; gap: 20px; padding-top: 10px; padding-bottom: 20px; background: #f4f2f2;">
    <SibarVue/>

      <div style="height: 100%; display: grid; grid-template-rows: 80px 100vh;">
        <div class="top shadow p-3 px-5 rounded" style="display:flex; justify-content: center; align-items: center;">
          <h3 class="acc"><b> My Favorites</b></h3>
        </div>
       
        <div class="top shadow p-3 form_Card" style="height: 80%;display: flex; flex-wrap: wrap; gap: 20px; overflow-y: scroll;">
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

    <!---footer-->
  </WebLayout>
  <FooterMenuVue></FooterMenuVue>

</template>

<style>
.acc {
  color: #691BA5;
}
</style>