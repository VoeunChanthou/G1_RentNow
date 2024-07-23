<template>
  <el-container class="layout-container-demo" style="height: 100vh">
    <AdminLayout />
    <!-- {{ information.product }} -->
    <el-container>
      <el-main class="px-5 py-5" style="background-color: rgb(207, 207, 207)">
        <div style=" margin: -45px 0 20px -45px;">
          
          <NavbarShopOwner ></NavbarShopOwner>
        </div>
        <StatisticCard />
        <el-row :gutter="16" style="margin-top: 20px">
          <el-col :span="12">
            <ChartComponent v-if="information.shopInfo.length !=0" :numberOfpro="information.product" />
          </el-col>
          <el-col :span="12">
            <PolarArea v-if="information.shopInfo.length !=0" :info="information.product" />
          </el-col>
        </el-row>
        <CalendarVue v-if="information.shopInfo.length !=0"/>
        <MapVue v-if="myShopOwner.ownshop.data" :lat="myShopOwner.ownshop.data.latitude" :long="myShopOwner.ownshop.data.longitude"/>
      </el-main>
    </el-container>
  </el-container>
</template>
  
  <script lang="ts" setup>
import { Menu as IconMenu, Message, Setting } from '@element-plus/icons-vue'
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import ChartComponent from '@/Components/Shop/dashboard/ChartComponent.vue'
import PolarArea from '@/Components/Shop/dashboard/PolarArea.vue'
import StatisticCard from '@/Components/Shop/dashboard/StatisticCard.vue'
import CalendarVue from '@/Components/Shop/dashboard/CalendarVue.vue'
import MapVue from '@/Components/Shop/dashboard/MapVue.vue';
import NavbarShopOwner from '@/Components/NavbarShopOwner.vue'
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'
import { computed, ref } from 'vue'

const information = useShopDashboard();
const myShopOwner = useMyshop();

const ss = myShopOwner.fetchMyShop()
const info = information.fetchShopInfor();
const AuthUSer = useAuthStore()

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

const tableData: User[] = [
  {
    date: '2016-05-03',
    name: 'Tom',
    address: 'No. 189, Grove St, Los Angeles',
  },
  {
    date: '2016-05-02',
    name: 'John',
    address: 'No. 189, Grove St, Los Angeles',
  },
  {
    date: '2016-05-04',
    name: 'Morgan',
    address: 'No. 189, Grove St, Los Angeles',
  },
  {
    date: '2016-05-01',
    name: 'Jessy',
    address: 'No. 189, Grove St, Los Angeles',
  },
]
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