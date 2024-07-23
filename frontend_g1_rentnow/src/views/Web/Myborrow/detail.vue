
<script setup lang="ts">

import { Icon } from '@iconify/vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue';
import WebLoginVue from '@/Components/homepage/WebLogin.vue';
import PopupRegisterVue from '@/Components/homepage/PopupRegister.vue';

import FooterMenuVue from '@/Components/homepage/FooterMenu.vue';

import type { componentSizeMap } from 'element-plus';
import { ref } from 'vue';
import { useAuthStore } from '@/stores/auth-store.ts'
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'
import { useRoute } from 'vue-router'

const route = useRoute();
const router = useRouter()
const AuthUSer = useAuthStore()
const id = ref()
const detail = ref()


const fectCard=(data:any)=>{
  id.value = data;
}

async function fetchData() {
  
    const response = await axiosInstance.get(`/product/${route.params.id}`)
    detail.value = response.data.data;


}

fetchData()

</script>

<template>
  <WebLayout> 
      <div class="px-5" style=" height: 60vh; display: flex; justify-content: center; gap: 20px; padding-top: 20px; padding-bottom: 20px; background: #f4f2f2;">
          
        <div class="card" style="width: 60%; padding-bottom: 20px;">
            <div class="card-header" style="display: flex;  align-items: center; height: 8vh; color: #ffd800;">
              <a href="/my/product" style=" color: black; margin-right: 46%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
              </svg></a>
              <h1>{{ detail.name }}</h1>
              
            </div>
            <div class="card-body" style="display: flex; padding: 4%;">
                <div style="width: 40%;">
                  <div style="display: flex;">
                    <p class="card-title"><b>Price: </b> {{ detail.price }}$ / </p>
                    <span class="text-danger"> ${{ detail.price / 2 }}</span>
                  </div>
                  <p class="card-title"><b>Shop Country: </b> {{ detail.shop.Country }}</p>
                  <p class="card-title"><b>Category type: </b> {{ detail.category.name }}</p>
                  <p class="card-title"><b>Shop Name: </b> {{ detail.shop.name }} </p>
                  <p class="card-title"><b>Post on: </b> {{ detail.shop.created_at }}</p>
                  <div style="display: flex; gap: 15px;">
                    <p><b>Status: </b></p>
                    <p style="color: greenyellow;">Available</p>
                    <p style="color: red;">Borrowed</p>
                  </div>
                </div>
                <div style="width: 60%; display: flex; justify-content: end; left: 50%;">
                    <img :src="detail.image" style="width: 60%; height: 80%;">
                </div>
            </div>
        </div>
      </div>
    <!-- {{ myProduct.partner.member }} -->

    <!-- login -->
    <WebLoginVue></WebLoginVue>

    

    <!-- register -->
    <PopupRegisterVue></PopupRegisterVue>
    <FooterMenuVue/>
  </WebLayout>

</template>

<style>
@media (max-width: 767.98px) { .border-sm-start-none { border-left: none !important; } }
.acc {
  color: #691BA5;
}
</style>