<!-- <template>
    <WebLayout >
      <detail-history :DetailProps = "Detail" :DetailBorrow = 'DetailBorrow' :detailll = "detailll" />
            <Header />
            <CardHistory v-for="product in listhistory.data" :key="product.id" :product = "product" :Shop_owner="product.Shop_owner" @deletehistory = "Deletehistory" @DetailHistory = "DetailHistory " />
        </WebLayout>
</template>
<script >
import DeletePopup from '@/Components/history/PopupDelete.vue'
import axiosInstance from '@/plugins/axios'
import LoadingView from "@/Components/loading/LoadingView.vue";
import WebLayout from "@/Components/Layouts/WebLayout.vue"
import FooterMenuVue from '@/Components/homepage/FooterMenu.vue';
import Header from "@/Components/history/HeaderHistory.vue"
import SibarVue from "@/Components/favorite/SibarVue.vue"
import CardHistory from "@/Components/history/CardHistory.vue";
import DetailHistory from '../../Components/history/DetailHistory.vue';
export default {
  components : {
    DeletePopup,
    LoadingView,
    WebLayout,
    Header,
    CardHistory,
    DetailHistory
  },
  data (){
    return {
      listhistory : [],
      Detail : {},
      DetailBorrow : {},
      detailll : {}
    }
  },
  mounted() {
    this.getHistory()
  },
  methods: {
    async getHistory (){
      try {
        let response = await axiosInstance.get('list/history')
        this.listhistory = response.data
        console.log(response.data)  ;
      } catch (error) {
        console.log(error)
      }
    },
    async Deletehistory (id){
      try {
        let response = await axiosInstance.delete(`/delete/${id}`)
        this.getHistory()
      }catch (error) {
        console.log(error);
      }
    },
    async DetailHistory (id){
      try {
        let response = await axiosInstance.get(`/detail/history/${id}`)
        this.Detail = response.data.data.Shop_owner.name;
        this.DetailBorrow = response.data.data.Product;
        this.detailll = response.data.data
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script> -->




<template>
    <WebLayout >
      <div class="px-5" style=" height: auto; display: grid; grid-template-columns: 25% 74%; gap: 20px; padding-top: 10px; padding-bottom: 20px; background: #ffffff;">
        <SibarVue/>
      <div style="height: 100%;">
        
        <DeletePopup @Deletehistory = "Deletehistory" />
        <Header />
        <CardHistory v-for="product in listhistory.histories.data" :key="product.id" :product = "product" @idproduct ="iddelete" />
        <div v-if="listhistory.histories.data == [] ">
          <h4 class="text-center text-danger">Your are not History ! </h4>
        </div>
        <h2 v-if="!listhistory.histories.data" >
            <LoadingView />
        </h2>
      </div>
    </div>
  </WebLayout>
  <FooterMenuVue/>
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

    try {
    await axiosInstance.get('/delete/' + id);
    const listhistory = userHistory()
const his = listhistory.fetchhistory()
  } catch (error) {
    console.warn('Error')
  }
    
})

</script>
