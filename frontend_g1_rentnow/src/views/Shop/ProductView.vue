<template>
  <el-container class="layout-container-demo" style="height: 100vh">
    <AdminLayout />
    <el-container>
      
      <el-main class="px-5 py-5" style="background-color: rgb(207, 207, 207)">
        <div style=" margin: -45px 0 20px -45px;">
          <NavbarShopOwner ></NavbarShopOwner>
        </div>
        <div style="width: 100%; display: flex; justify-content: end;">
          <el-button  type="primary" :icon="Plus"><el-link href="/create/product" style="color: white;">Create</el-link></el-button>
        </div>
        <ProductVue />
      </el-main>
    </el-container>
  </el-container>
</template>
    
<script lang="ts" setup>
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import ProductVue from '@/Components/Shop/products/ProductVue.vue'
import CreateProduct from './product/CreateProduct.vue';
import { Search, Plus, Setting } from '@element-plus/icons-vue'
import NavbarShopOwner from '@/Components/NavbarShopOwner.vue'

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
