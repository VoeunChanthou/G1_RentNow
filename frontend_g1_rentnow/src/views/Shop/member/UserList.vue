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
        <div v-if="isMember === true" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> This user is add to member successfully
  <button type="button" class="btn-close" @click="onAdd"></button>
</div>
        <div style="width: 100%; display: flex; justify-content: end; margin-bottom: 20px"></div>
        <el-table :data="userList" style="width: 100%">
          <el-table-column prop="id" label="ID" width="100" />
          <el-table-column prop="first_name" label="First Name" width="250" />
          <el-table-column prop="last_name" label="Last Name" width="250" />
          <el-table-column prop="email" label="Email" width="250" />

          <el-table-column fixed="right" label="Operations" min-width="200">
            <template #default="scope">
              <el-button type="primary"
                ><el-link
                  :icon="View"
                  :href="`/view/profile/${scope.row.id}`"
                  style="color: white"
                ></el-link
              ></el-button>
              <el-button type="success" :icon="Plus" @click="submitForm(scope.row.id)" />
            </template>
          </el-table-column>
        </el-table>
      </el-main>
    </el-container>
  </el-container>
</template>
      
      <script lang="ts" setup>
import { Search, Plus, Setting, View } from '@element-plus/icons-vue'
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import type { UploadInstance } from 'element-plus'
import axiosInstance from '@/plugins/axios'
import { reactive, ref } from 'vue'

const userList = ref()
const isMember = ref();
async function fetchData() {
  try {
    const response = await axiosInstance.get('/list/user')
    userList.value = response.data
  } catch (error) {
    console.error(error)
  }
}

fetchData()

async function submitForm(user_id: string) {
  const response = await axiosInstance.post('/add/member', {
    user_id: user_id
  });
  console.log(response)
  if(response){
    isMember.value = true;
    fetchData()
  }
};

function onAdd(){
  isMember.value = false;
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