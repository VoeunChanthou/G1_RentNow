<template>
  <el-table :data="filterTableData" style="width: 100%; margin-top: 20px">
    <el-table-column align="center">
      <template #header>
        <el-table-column label="Product Image" /> Image
      </template>
      <template #default="scope">
        <img :src="scope.row.image" alt="Product Image" style="max-width: 50px; max-height: 50px" />
      </template>
    </el-table-column>

    <el-table-column label="Name" prop="name" />
    <el-table-column label="Price" prop="price" />
    <el-table-column label="Category" prop="category.name" />
    <el-table-column label="User_id" prop="user_id" />
    <el-table-column align="right">
      <template #header>
        <el-input v-model="search" size="small" placeholder="Type to search" />
      </template>
      <template #default="scope">
        <el-button type="primary" :icon="Edit" circle />
        <el-button type="primary" :icon="View" circle />
        <el-button type="danger" :icon="Delete" circle />
      </template>
    </el-table-column>
  </el-table>
</template>

<script lang="ts" setup>
import { Edit, Delete, View } from '@element-plus/icons-vue'
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

<style>
</style>








// const tableData: User[] = [
//   {
//     date: '2016-05-03',
//     name: 'Tom',
//     address: 'No. 189, Grove St, Los Angeles'
//   },
//   {
//     date: '2016-05-02',
//     name: 'John',
//     address: 'No. 189, Grove St, Los Angeles'
//   },
//   {
//     date: '2016-05-04',
//     name: 'Morgan',
//     address: 'No. 189, Grove St, Los Angeles'
//   },
//   {
//     date: '2016-05-01',
//     name: 'Jessy',
//     address: 'No. 189, Grove St, Los Angeles'
//   }
// ]
