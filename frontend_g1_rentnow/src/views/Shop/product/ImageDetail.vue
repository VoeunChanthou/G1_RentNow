<!-- <template>
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
        <el-table :data="filterTableData" style="width: 100%;">
          <el-table-column align="center">
            <template #header> <el-table-column label="Product Image" /> Image </template>
            <template #default="scope">
              <img
                :src="scope.row.image"
                alt="Product Image"
                style="max-width: 50px; max-height: 50px"
              />
            </template>
          </el-table-column>

          <el-table-column label="Name" prop="name" />
          <el-table-column label="Price" prop="price" />
          <el-table-column label="Category" prop="category.name" />
          <el-table-column align="center">
            <template #header>
              <el-input v-model="search" size="small" placeholder="Type to search" />
            </template>
            <template #default="scope" >
              <el-button type="primary" :icon="View" circle style="margin-right: 10px;" />
              <el-link :href="`/uploadimagedetail/${scope.row.id}`">
                <el-button type="success" :icon="Plus" circle />
              </el-link>
            </template>
          </el-table-column>
        </el-table>
      </el-main>
    </el-container>
  </el-container>
</template>
  
  <script lang="ts" setup>
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import { Edit, Plus, View, Setting } from '@element-plus/icons-vue'
import axiosInstance from '@/plugins/axios'
import { computed, ref } from 'vue'

interface Product {
  id: number
  name: string
  price: number
  category: string
}

const productData = ref<Product[]>([])

async function fetchData() {
  try {
    const response = await axiosInstance.get('/product/shop')
    productData.value = response.data.products
  } catch (error) {
    console.error(error)
  }
}

fetchData()

const search = ref('')
const filterTableData = computed(() =>
  productData.value.filter((product) =>
    product.name.toLowerCase().includes(search.value.toLowerCase())
  )
)

const handleEdit = (index: number, row: Product) => {
  console.log(index, row)
}

const handleDelete = (index: number, row: Product) => {
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
</style> -->



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
        <el-table :data="filterTableData" style="width: 100%;">
          <el-table-column align="center">
            <template #header> <el-table-column label="Product Image" /> Image </template>
            <template #default="scope">
              <img
                :src="scope.row.image"
                alt="Product Image"
                style="max-width: 50px; max-height: 50px"
              />
            </template>
          </el-table-column>

          <el-table-column label="Name" prop="name" />
          <el-table-column label="Price" prop="price" />
          <el-table-column label="Category" prop="category.name" />
          <el-table-column align="center">
            <template #header>
              <el-input v-model="search" size="small" placeholder="Type to search" />
            </template>
            <template #default="scope" >
              <el-button type="primary" :icon="View" circle style="margin-right: 10px;" />
              <el-link :href="`/uploadimagedetail/${scope.row.id}`">
                <el-button type="success" :icon="Plus" circle />
              </el-link>
            </template>
          </el-table-column>
        </el-table>
      </el-main>
    </el-container>
  </el-container>
</template>
  
  <script lang="ts" setup>
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import { Edit, Plus, View, Setting } from '@element-plus/icons-vue'
import axiosInstance from '@/plugins/axios'
import { computed, ref } from 'vue'

interface Product {
  id: number
  name: string
  price: number
  category: string
}

const productData = ref<Product[]>([])

async function fetchData() {
  try {
    const response = await axiosInstance.get('/product/shop')
    productData.value = response.data.products
  } catch (error) {
    console.error(error)
  }
}

fetchData()

const search = ref('')
const filterTableData = computed(() =>
  productData.value.filter((product) =>
    product.name.toLowerCase().includes(search.value.toLowerCase())
  )
)

const handleEdit = (index: number, row: Product) => {
  console.log(index, row)
}

const handleDelete = (index: number, row: Product) => {
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