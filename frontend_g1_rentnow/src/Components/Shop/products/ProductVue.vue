<template>
  <el-table :data="filterTableData" style="width: 100%; margin-top: 20px">
    <el-table-column align="center">
      <template #header>
        <el-table-column label="Image"/>Image
      </template>
      <template #default="scope">
        <img src="../../../assets/bike.png" alt="Image" style="max-width: 50px; max-height: 50px" />
      </template>
    </el-table-column>

    <el-table-column label="Name" prop="name" />
    <el-table-column label="Price" prop="name" />
    <el-table-column label="Category" prop="name" />
    <el-table-column align="right">
      <template #header>
        <el-input v-model="search" size="small" placeholder="Type to search" />
      </template>
      <template #default="scope">
        <el-button type="primary" :icon="Edit" circle />
        <el-button type="danger" :icon="Delete" circle />
      </template>
    </el-table-column>
  </el-table>
</template>

<script lang="ts" setup>
import { Menu as IconMenu, Message, Setting } from '@element-plus/icons-vue'
import { Check, Delete, Edit, Search, Star } from '@element-plus/icons-vue'

import { computed, ref } from 'vue'

interface User {
  date: string
  name: string
  address: string
}

const search = ref('')
const filterTableData = computed(() =>
  tableData.filter(
    (data) => !search.value || data.name.toLowerCase().includes(search.value.toLowerCase())
  )
)
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
    address: 'No. 189, Grove St, Los Angeles'
  },
  {
    date: '2016-05-02',
    name: 'John',
    address: 'No. 189, Grove St, Los Angeles'
  },
  {
    date: '2016-05-04',
    name: 'Morgan',
    address: 'No. 189, Grove St, Los Angeles'
  },
  {
    date: '2016-05-01',
    name: 'Jessy',
    address: 'No. 189, Grove St, Los Angeles'
  }
]
</script>

<style>
</style>








  