<template>
  <el-container class="layout-container-demo" style="height: 100vh">
    <AdminLayout />
    <!-- {{ information.product }} -->
    <el-container>
      <!-- {{ information.shopInfo }} -->
      <el-main class="px-5 py-5" style="background-color: rgb(207, 207, 207)">
        <div style=" margin: -45px 0 20px -45px;">
          <NavbarShopOwner ></NavbarShopOwner>
        </div>
        <StatisticCard v-if="information.shopInfo.length!=0" :infomation="information"/>
        <el-row :gutter="16" style="margin-top: 20px">
          <el-col :span="12">
            <ChartComponent v-if="information.shopInfo.length !=0" :numberOfpro="information.product" />
          </el-col>
          <el-col :span="12">
            <PolarArea v-if="information.shopInfo.length !=0" :info="information" :countBorrow="borrows.countBorrow" :incom="borrows.incom" />
          </el-col>
        </el-row>
        <RecordStatus v-if="borrows.borrows != ''" :borrows="borrows.borrows"/>
        <CalendarVue v-if="information.shopInfo.length !=0"/>
        <MapVue v-if="myShopOwner.ownshop.data" :lat="myShopOwner.ownshop.data.latitude" :long="myShopOwner.ownshop.data.longitude"/>
      </el-main>
    </el-container>
  </el-container>
</template>
  
  <script lang="ts" setup>
  import NavbarShopOwner from '@/Components/NavbarShopOwner.vue'
import { Menu as IconMenu, Message, Setting } from '@element-plus/icons-vue'
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import ChartComponent from '@/Components/Shop/dashboard/ChartComponent.vue'
import PolarArea from '@/Components/Shop/dashboard/PolarArea.vue'
import StatisticCard from '@/Components/Shop/dashboard/StatisticCard.vue'
import CalendarVue from '@/Components/Shop/dashboard/CalendarVue.vue'
import MapVue from '@/Components/Shop/dashboard/MapVue.vue';
import RecordStatus from '@/Components/Shop/dashboard/RecordStatus.vue'
import { useShopDashboard, useMyshop } from '@/stores/shop-list.ts';
import axiosInstance from '@/plugins/axios';
import {useAuthStore} from '@/stores/auth-store.ts'


import { computed, ref } from 'vue'

const information = useShopDashboard();
const myShopOwner = useMyshop();
const borrows = useShopDashboard();

const rs = borrows.fetchBorrowShop();
const ss = myShopOwner.fetchMyShop();
const info = information.fetchShopInfor();
const AuthUSer = useAuthStore();

interface User {
  id: number
  last_name: string
  first_name: string
  phone_number: string
  email: string
}

const handleEdit = (index: number, row: User) => {
  console.log(index, row)
}
const handleDelete = (index: number, row: User) => {
  console.log(index, row)
}

</script>
  
  <style scoped>
.layout-container-demo .el-header {
  position: relative;
  background-color: var(--el-color-primary-light-7);
  color: var(--el-text-color-primary);
}
.layout-container-demo .el-aside {
  color: var(--el-text-color-primary);
  background: var(--el-color-primary-light-8);
}
.layout-container-demo .el-menu {
  border-right: none;
}
.layout-container-demo .el-main {
  padding: 0;
}
.layout-container-demo .toolbar {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  right: 20px;
}
</style>