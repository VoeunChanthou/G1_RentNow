
<script setup lang="ts">
import { Icon } from '@iconify/vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import CategoryVue from '@/Components/service/CategoryVue.vue'
// import CardVue from '@/Components/homepage/CardVue.vue'
import WebLoginVue from '@/Components/homepage/WebLogin.vue'
import PopupRegisterVue from '@/Components/homepage/PopupRegister.vue'
import FooterMenu from '@/Components/homepage/FooterMenu.vue'
import ShopMap from '@/Components/service/ShopMap.vue'
import type { componentSizeMap } from 'element-plus'
import { ref } from 'vue'
import type { Service } from '@element-plus/icons-vue'
import { useAuthStore } from '@/stores/auth-store.ts'
import { useRoute } from 'vue-router'
import axiosInstance from '@/plugins/axios';



const route = useRoute();

const AuthUSer = useAuthStore()

const shopInfo = ref()

async function fetchMemberData() {
  try {
    const response = await axiosInstance.get(`/web/shop/${route.params.id}`)
    shopInfo.value = response.data
  } catch (error) {
    console.error(error)
  }
}
fetchMemberData()



</script>

<template>
  <WebLayout>
    <div
      class="px-5"
      style="
        height: 140vh;
        display: grid;
        grid-template-columns: 28% 71%;
        gap: 20px;
        padding-top: 10px;
        padding-bottom: 20px;
        background: #e8e7e7;
      "
    >
      <div class="search-bar" style="height: 100%">
        <div
          class="div-first shadow py-2 px-2 mb-3 bg-white rounded"
          style="height: 70vh; background: rgb(208, 208, 208)"
        >
          <div class="image shadow rounded" style="height: 40vh">
            <img :src="shopInfo.data.image" alt="" style="width: 100%; height: 100%" />
          </div>
          <div class="info" style="height: 27vh; margin-top: 5px; padding-top: 10px">
            <h5>Shop: {{shopInfo.data.name}}</h5>
            <h5>Owner: {{shopInfo.data.ownership.first_name}} {{shopInfo.data.ownership.last_name}}</h5>
            <h5>Address: {{shopInfo.data.Country}} {{shopInfo.data.Province}} {{shopInfo.data.street}}</h5>
            <h5>Phone: {{shopInfo.data.ownership.phone_number}}</h5>
            <h5>Email: {{shopInfo.data.ownership.email}}</h5>
          </div>
        </div>

        <div
          class="div-third shadow py-2 px-2 bg-white rounded"
          style="height: 40vh; background: rgb(208, 208, 208)"
        >
          <ShopMap />
        </div>
      </div>
      <!-- {{ shopInfo.data }} -->
      <div style="height: 100%; display: grid; grid-template-rows: 10% 98%; gap: 20px">
        <div
          class="top shadow p-3 px-5 rounded bg-white"
          style="display: flex; justify-content: space-between; align-items: center"
        >
          <h3>{{shopInfo.data.name}}</h3>
          <div class="search" style="padding-left: 30px">
            <el-input
              v-model="product"
              style="width: 100%"
              size="large"
              placeholder="Please Input"
              @input="handleSomeEvent"
            />
          </div>
        </div>

        <div
          class="top shadow p-3 rounded form_Card"
          style="
            height: 90%;
            background: #f4f2f2;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            overflow-y: scroll;
            z-index: 0;
          "
        ></div>
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