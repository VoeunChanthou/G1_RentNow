<template>
         <el-header

        style="
          width: 105%;
          text-align: right;
          font-size: 12px;
          background: linear-gradient(90deg, #722cb3 30%, #c49be9);
          height: 80px; 
        "
      >
      <div class="toolbar">
            {{ AuthUSer.user.first_name }}
          <el-dropdown>
            <el-icon style="margin-right: 8px; margin-top: 1px; font-size: 30px">
              <setting />
            </el-icon>
            <template #dropdown>
              <el-dropdown-menu>
                <el-dropdown-item> <img src="https://cdn-icons-png.freepik.com/512/2092/2092594.png"  height="20px" style="margin-right: 10px;"  alt="image View"> View</el-dropdown-item>
                <el-dropdown-item> <img src="https://cdn-icons-png.flaticon.com/512/992/992651.png" height="20px" style="margin-right: 10px;" alt="add imgae"> Add</el-dropdown-item>
                <el-dropdown-item class="btn"> <img src="https://cdn-icons-png.flaticon.com/512/4400/4400629.png" height="20px" style="margin-right: 5px; margin-left: 5px;"  alt="image View">
                  Log out
                </el-dropdown-item>
              </el-dropdown-menu>
            </template>
          </el-dropdown>
          <span>Tom</span>
        </div>
      </el-header> 
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
import {useAuthStore} from '@/stores/auth-store.ts'
import { useRouter } from 'vue-router'
import { computed, ref } from 'vue'

interface User {
    date: string
    name: string
    address: string
}
const AuthUSer = useAuthStore()
const router = useRouter()

const search = ref('')
const filterTableData = computed(() =>
  tableData.filter(
    (data) =>
      !search.value ||
      data.name.toLowerCase().includes(search.value.toLowerCase())
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


const onSubmit = (async () => {
  try {
    const { data } = await axiosInstance.post('/logout')
    localStorage.setItem('access_token', data.access_token)
    location.reload()
    router.push('/home')
  } catch (error) {
    console.warn('Error')
  }
})
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