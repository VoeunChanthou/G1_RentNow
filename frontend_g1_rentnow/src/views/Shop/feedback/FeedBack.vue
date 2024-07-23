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
        <div
          class="content-comment"
          style="
            background: white;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
          "
        >
          <h2>All comments</h2>
        </div>
        <table class="table align-middle mb-0 bg-white mt-4">
          <thead class="bg-light">
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Status</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- {{ borrows }} -->
            <tr v-for="product in feedback" :key="product.id">
              <td>{{ product.id }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <img
                    :src="product.image"
                    alt=""
                    style="width: 45px; height: 45px"
                    class="rounded-circle"
                  />
                </div>
              </td>
              <td>
                <p class="fw-normal mb-1">{{ product.name }}</p>
              </td>
              <td>
                <span
                  class="badge-success rounded-pill d-inline"
                  style="background: rgb(140, 255, 73); padding-left: 7px; padding-right: 7px"
                  >{{ product.status }}</span
                >
              </td>
              <td>${{ product.price }}.00</td>
              <td>
                <a :href="`/product/feedback/shop/${product.id}`">
                  <el-button
                    type="primary"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasView"
                    :icon="View"
                    circle
                  />
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </el-main>
    </el-container>
  </el-container>
</template>
          
<script lang="ts" setup>
import { Search, Plus, Setting, View } from '@element-plus/icons-vue'
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import type { UploadInstance } from 'element-plus'
import axiosInstance from '@/plugins/axios'
import { computed, ref } from 'vue'

const feedback = ref()
async function fetchFeedback() {
  try {
    const response = await axiosInstance.get('/get/comment/shop')
    feedback.value = response.data.data
  } catch (error) {
    console.error(error)
  }
}

fetchFeedback()
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