
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
    <div class="px-5" style=" height: 100vh; display: grid; grid-template-columns: 25% 74%; gap: 20px; padding-top: 10px; padding-bottom: 20px; background: #f4f2f2;">
    <div class="top shadow search-bar shadowp p-3 bg-white rounded" style="height: 82%;display: flex; ">
      <div class="right mt-0" style="width: 100%; height: 60vh; display: flex; flex-direction: column;">
        <img class="mt-0" src="../../assets/buy.jpg" alt="">
        <h2 class="acc" style="display: flex; justify-content: center;"><b>Account</b></h2>
        <div class="ml-10 mt-3" style="height: 700px; display: flex; flex-direction: column; gap: 10px; justify-content: space-evenly;">
          <a class="dropdown-item" style="color: gray;" href="/history"><p><b>My Borrow</b></p></a>
          <a class="dropdown-item" style="color: gray;" href="/message"><p><b>Message</b></p></a>
          <a class="dropdown-item" style="color: gray;" href="#"><p><b>Favorite List</b></p></a>
          <a class="dropdown-item" style="color: gray;" href="#"><p><b>Account Settings</b></p></a>
          <a class="dropdown-item" style="color: gray;" href="#"><p><b>Help</b></p></a>
          <button class="dropdown-item " style="color: gray;" @click ="onSubmit"><p><b>Sign Out</b></p></button>
        </div>   
        </div>
      </div>

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
  </WebLayout>

</template>

<style>
.acc {
  color: #691BA5;
}

.acc:hover {
  color: #FFD800;
}
</style>