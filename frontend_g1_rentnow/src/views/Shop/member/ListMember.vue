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
                <el-dropdown-item class="btn" @click="onSubmit"> <img src="https://cdn-icons-png.flaticon.com/512/4400/4400629.png" height="20px" style="margin-right: 5px; margin-left: 5px;"  alt="image View">
                  Log out
                </el-dropdown-item>
              </el-dropdown-menu>
            </template>
          </el-dropdown>
          <span>Tom</span>
        </div>
      </el-header>

      <el-main class="px-5 py-5" style="background-color: rgb(207, 207, 207)">
        <div style="width: 100%; display: flex; justify-content: end; margin-bottom: 20px;">
          <el-button  type="primary" :icon="Plus"><el-link href="/add/member" style="color: white;">add member</el-link></el-button>
        </div>
        <el-table :data="members" style="width: 100%">
          <el-table-column prop="member.id" label="ID" width="100" />
          <el-table-column prop="member.first_name" label="First Name" width="250" />
          <el-table-column prop="member.last_name" label="Last Name" width="250" />
          <el-table-column prop="member.email" label="Email" width="250" />

          <el-table-column fixed="right" label="Operations" min-width="200">
            <template #default="scope">
              <el-button  type="primary" ><el-link :icon="View" :href="`/view/member/profile/${scope.row.id}`" style="color: white;"></el-link></el-button>
              <el-button  type="danger" :icon="Delete" @click="deleteMember(scope.row.id)" ></el-button>
            </template>
          </el-table-column>
        </el-table>
      </el-main>
    </el-container>
  </el-container>
</template>
    
    <script lang="ts" setup>
import { Search, Plus, Setting, View, Delete } from '@element-plus/icons-vue'
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import type { UploadInstance } from 'element-plus'
import axiosInstance from '@/plugins/axios'
import { reactive, ref } from 'vue'




const members = ref()
async function fetchData() {
  try {
    const response = await axiosInstance.get('/members')
    members.value = response.data.data.member
  } catch (error) {
    console.error(error)
  }
};

async function deleteMember(id: string){
  try {
    const response = await axiosInstance.delete(`/remove/${id}`);
    fetchData();
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