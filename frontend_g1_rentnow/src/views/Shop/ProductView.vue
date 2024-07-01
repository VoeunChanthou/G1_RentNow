<template>
    <el-container class="layout-container-demo" style="height: 100vh">
      <AdminLayout />
      <el-container>
        <el-header
          style="
            text-align: right;
            font-size: 12px;
            background: linear-gradient(90deg, #722cb3 30%, #c49be9);
            height: 80px;
          "
        >
          <div class="toolbar">
            <el-dropdown>
              <el-icon style="margin-right: 8px; margin-top: 1px; font-size: 30px">
                <setting />
              </el-icon>
              <template #dropdown>
                <el-dropdown-menu>
                  <el-dropdown-item>View</el-dropdown-item>
                  <el-dropdown-item>Add</el-dropdown-item>
                  <el-dropdown-item>Delete</el-dropdown-item>
                </el-dropdown-menu>
              </template>
            </el-dropdown>
            <span>Tom</span>
          </div>
        </el-header>
  
        <el-main class="px-5 py-5" style="background-color: rgb(207, 207, 207)">
          <ProductVue/>
        </el-main>
      </el-container>
    </el-container>
  </template>
    
    <script lang="ts" setup>
  import { Menu as IconMenu, Message, Setting } from '@element-plus/icons-vue'
  import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
  

  
  import { computed, ref } from 'vue'
  
  
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
