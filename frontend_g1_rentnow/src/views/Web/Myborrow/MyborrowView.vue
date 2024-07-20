
<script setup lang="ts">

import { Icon } from '@iconify/vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue';
import WebLoginVue from '@/Components/homepage/WebLogin.vue';
import PopupRegisterVue from '@/Components/homepage/PopupRegister.vue';
import ProductCardVue from '@/Components/product/ProductCard.vue';
import CardVue from '@/Components/favorite/favoriteComponent.vue';
import SibarVue from '@/Components/favorite/SibarVue.vue';
import FooterMenuVue from '@/Components/homepage/FooterMenu.vue';

import type { componentSizeMap } from 'element-plus';
import { ref } from 'vue';
import { useAuthStore } from '@/stores/auth-store.ts'
import { MememberStore } from '@/stores/member-list.ts';
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'


const router = useRouter()
const AuthUSer = useAuthStore()
const myProduct = MememberStore();
const id = ref()

const Mepartner = myProduct.fetchMemember();

const fectCard=(data:any)=>{
  id.value = data;
}

</script>

<template>
  <WebLayout>

    <div class="px-5" style=" height: 100vh; display: grid; grid-template-columns: 25% 74%; gap: 20px; padding-top: 10px; padding-bottom: 20px; background: #f4f2f2;">
    <SibarVue :product="myProduct.partner.data"/>

      <div style="height: 100%; display: grid; grid-template-rows: 80px 100vh;">
        <div class="top shadow p-3 px-5 rounded" style="display:flex; justify-content: center; align-items: center;">
          <h3 class="acc"><b> My product</b></h3>
        </div>
       
        <div class="top shadow p-3 form_Card" style="height: 80%; gap: 20px; overflow-y: scroll;">
            <ProductCardVue v-for="(i, index) in myProduct.partner.products" :key="index" :product="i" @detail="fectCard"/>
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