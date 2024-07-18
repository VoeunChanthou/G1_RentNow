<template>
    <WebLayout >
      <div class="px-5" style=" height: 100vh; display: grid; grid-template-columns: 25% 74%; gap: 20px; padding-top: 10px; padding-bottom: 20px; background: #ffffff;">
        <SibarVue/>
      <div style="height: 100%;">
        
        <DeletePopup @Deletehistory = "Deletehistory" />
        <Header />
        <CardHistory v-for="product in listhistory.histories.data" :key="product.id" :product = "product" @idproduct ="iddelete" />
        <div v-if="!listhistory.histories.data == [] ">
          <h4 class="text-center text-danger">Your are not History ! </h4>
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
import Header from "@/Components/history/HeaderHistory.vue"
import SibarVue from "@/Components/favorite/SibarVue.vue"
import CardHistory from "@/Components/history/CardHistory.vue";
import { useAuthStore } from '@/stores/auth-store.ts'
import {userHistory} from '@/stores/history-list'
import { log } from "console";


const AuthUSer = useAuthStore()
const listhistory = userHistory()
const his = listhistory.fetchhistory()
let id = null;
const iddelete = (async (productid) => {
   id = productid
})
const Deletehistory = (async () => {
    console.log(id);
    try {
    await axiosInstance.delete('/delete/' + id)
    location.reload();
  } catch (error) {
    console.warn('Error')
  }
    
})

</script>
