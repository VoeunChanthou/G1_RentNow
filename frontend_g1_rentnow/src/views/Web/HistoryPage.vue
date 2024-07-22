<template>
    <WebLayout >
      <detail-history :DetailProps = "Detail" :DetailBorrow = 'DetailBorrow' :detailll = "detailll" />
            <!-- <Header /> -->
            <CardHistory v-for="product in listhistory.data" :key="product.id" :product = "product" :Shop_owner="product.Shop_owner" @deletehistory = "Deletehistory" @DetailHistory = "DetailHistory " />
        </WebLayout>
</template>
<script >
import DeletePopup from '@/Components/history/PopupDelete.vue'
import axiosInstance from '@/plugins/axios'
import LoadingView from "@/Components/loading/LoadingView.vue";
import WebLayout from "@/Components/Layouts/WebLayout.vue"
import Header from "@/Components/history/HeaderHistory.vue"
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
</script>
