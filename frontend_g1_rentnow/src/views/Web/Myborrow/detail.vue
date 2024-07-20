
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
    {{ detail }} 
      <div class="px-5" style=" height: 60vh; display: flex; justify-content: center; gap: 20px; padding-top: 10px; padding-bottom: 20px; background: #f4f2f2;">
          
        <div class="card" style="width: 80%;">
            <h3 class="card-header" style="display: flex; justify-content: center; align-items: center; height: 8vh; color: #ffd800 ;">{{ detail.name }}</h3>
            <div class="card-body" style="display: flex; padding-top: 10px; padding-bottom: 20px;">
                <div style="width: 60%;">
                    <p class="card-title"><b>Price: </b> {{ detail.price }}$</p>
                    <p class="card-title"><b>Shop Name: </b> {{ detail.shop.name }} </p>
                    <p class="card-title"><b>Shop Country: </b> {{ detail.shop.Country }}</p>
                    <p class="card-title"><b>ខ្ចីម៉ាណដង: </b> {{ detail.shop.Country }}</p>
                </div>
                <div style="width: 40%;">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>  
                </div>
            </div>
            <a href="/my/product" class="btn btn-primary">Back</a>
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