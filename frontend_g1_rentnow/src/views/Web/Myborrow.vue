<template>
    <WebLayout >
      <div class="px-5" style=" height: auto; display: grid; grid-template-columns: 25% 74%; gap: 20px; padding-top: 10px; padding-bottom: 20px; background: #ffffff;">
        <SibarVue/>
      <div style="height: 100%;">
        <Header />
        <CardBorrow v-for="product in listhistory.histories.data" :key="product.id" :product = "product" />
        <div v-if="listhistory.histories.data == [] ">
          <h4 class="text-center text-danger">Your are not Borrowed ! </h4>
        </div>
        <h2 v-if="!listhistory.histories.data" >
            <LoadingView />
        </h2>
      </div>
    </div>
    <FooterMenuVue/>
  </WebLayout>
</template>
<script setup lang = "ts">
import DeletePopup from '@/Components/history/PopupDelete.vue'
import axiosInstance from '@/plugins/axios'
import LoadingView from "@/Components/loading/LoadingView.vue";
import WebLayout from "@/Components/Layouts/WebLayout.vue"
import FooterMenuVue from '@/Components/homepage/FooterMenu.vue';
import Header from "@/Components/borrow/BorrowHeader.vue"
import SibarVue from "@/Components/favorite/SibarVue.vue"
import CardBorrow from "@/Components/borrow/CardBorrow.vue"
import { useAuthStore } from '@/stores/auth-store.ts'
import {userHistory} from '@/stores/history-list'
// import { ref, onMounted } from 'vue';



const AuthUSer = useAuthStore()
const listhistory = userHistory()
const his = listhistory.fetchhistory()
// const currentDate=ref();

  



// function getCurrentDate() {
//   const today = new Date();
//   const year = today.getFullYear();
//   const month = String(today.getMonth() + 1).padStart(2, '0');
//   const day = String(today.getDate()).padStart(2, '0');
//   currentDate.value = `${year}-${month}-${day}`;
// }

// getCurrentDate()


</script>
