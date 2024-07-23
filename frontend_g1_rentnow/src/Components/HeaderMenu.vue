<template>
  <el-aside width="300px" style="overflow: hidden">
    <el-header
      style="
        height: 80px;
        display: flex;
        justify-content: start;
        align-items: center;
        background: #722cb3;
      "
    >
      <el-image src="../../../src/assets/image62.png" style="width: 150px"></el-image>
    </el-header>
    <el-scrollbar>
      <el-menu :default-openeds="['1', '4']">
        <el-menu-item><el-icon><Icon icon="material-symbols:team-dashboard-outline"></Icon></el-icon><el-link href="/">Dashboard</el-link></el-menu-item>
        <el-sub-menu index="1">
          <template #title>
            <el-icon><Icon icon="icon-park-outline:ad-product" width="20" height="20"></Icon></el-icon>Product
          </template>
            <el-menu-item><el-link href="/shop/product">All products</el-link></el-menu-item>
            <el-menu-item><el-link href="/imgdetail">Detial</el-link></el-menu-item>
        </el-sub-menu>

        <el-sub-menu index="2">
          <template #title>
            <el-icon><Icon icon="material-symbols:category-outline" width="20" height="20"></Icon></el-icon>Categories
          </template>
            <el-menu-item v-for=" cate in categories" :key="cate.id" :index="2-1">{{ cate.name }}</el-menu-item>
            
        </el-sub-menu>
        <el-sub-menu index="3">
          <template #title>
            <Icon icon="fluent:people-community-28-regular" width="24" height="24"  style="color: #1f1f1f; margin-right: 9px; "></Icon>Member
          </template>
            <el-menu-item index="2-1"><el-link href="/shop/member">Members</el-link> </el-menu-item>
        </el-sub-menu>
        <el-sub-menu index="4">
          <template #title>
            <el-icon><message /></el-icon>Messages
          </template>
          <el-menu-item-group>
            <el-menu-item index="3-1">To admin</el-menu-item>
            <el-menu-item index="3-2"><el-link href="/shop/chat">Chat</el-link></el-menu-item>
          </el-menu-item-group>
          <el-sub-menu index="3-4">
            <template #title>Feedback</template>
            <el-menu-item index="3-4-1"><el-link href="/feedback">My feedback</el-link></el-menu-item>
            
          </el-sub-menu>
        </el-sub-menu>
      </el-menu>
    </el-scrollbar>
  </el-aside>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import { Icon } from '@iconify/vue'
import { Menu as IconMenu, Message, Setting } from '@element-plus/icons-vue'
import axiosInstance from '@/plugins/axios'




const item = {
  date: '2016-05-02',
  name: 'Tom',
  address: 'No. 189, Grove St, Los Angeles'
}
const tableData = ref(Array.from({ length: 20 }).fill(item))
const url = '@/assets/image 62.png'


const categories = ref()
async function fetchData() {
  try {
    const response = await axiosInstance.get('/shop/categories')
    categories.value = response.data
    // console.log(response.data)
  } catch (error) {
    console.error(error)
  }
};

fetchData()
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
