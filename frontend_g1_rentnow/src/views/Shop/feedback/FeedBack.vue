<!-- <template>
    <el-table :data="tableData" style="width: 100%">
      <el-table-column fixed prop="date" label="Date" width="150" />
      <el-table-column prop="name" label="Name" width="120" />
      <el-table-column prop="state" label="State" width="120" />
      <el-table-column prop="city" label="City" width="120" />
      <el-table-column prop="address" label="Address" width="600" />
      <el-table-column prop="zip" label="Zip" width="120" />
      <el-table-column fixed="right" label="Operations" min-width="120">
        <template #default>
          <el-button link type="primary" size="small" @click="handleClick">
            Detail
          </el-button>
          <el-button link type="primary" size="small">Edit</el-button>
        </template>
      </el-table-column>
    </el-table>
  </template>
  
  <script lang="ts" setup>
  const handleClick = () => {
    console.log('click')
  }
  
  const tableData = [
    {
      date: '2016-05-03',
      name: 'Tom',
      state: 'California',
      city: 'Los Angeles',
      address: 'No. 189, Grove St, Los Angeles',
      zip: 'CA 90036',
      tag: 'Home',
    },
    {
      date: '2016-05-02',
      name: 'Tom',
      state: 'California',
      city: 'Los Angeles',
      address: 'No. 189, Grove St, Los Angeles',
      zip: 'CA 90036',
      tag: 'Office',
    },
    {
      date: '2016-05-04',
      name: 'Tom',
      state: 'California',
      city: 'Los Angeles',
      address: 'No. 189, Grove St, Los Angeles',
      zip: 'CA 90036',
      tag: 'Home',
    },
    {
      date: '2016-05-01',
      name: 'Tom',
      state: 'California',
      city: 'Los Angeles',
      address: 'No. 189, Grove St, Los Angeles',
      zip: 'CA 90036',
      tag: 'Office',
    },
  ]
  </script> -->
  

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
        <table class="table align-middle mb-0 bg-white">
          <thead class="bg-light">
            <tr>
              <th>Name</th>
              <th>Title</th>
              <th>Status</th>
              <th>Position</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img
                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                    alt=""
                    style="width: 45px; height: 45px"
                    class="rounded-circle"
                  />
                  <div class="ms-3">
                    <p class="fw-bold mb-1">John Doe</p>
                    <p class="text-muted mb-0">john.doe@gmail.com</p>
                  </div>
                </div>
              </td>
              <td>
                <p class="fw-normal mb-1">Software engineer</p>
                <p class="text-muted mb-0">IT department</p>
              </td>
              <td>
                <span class="badge badge-success rounded-pill d-inline">Active</span>
              </td>
              <td>Senior</td>
              <td>
                <button type="button" class="btn btn-link btn-sm btn-rounded">Edit</button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img
                    src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                    class="rounded-circle"
                    alt=""
                    style="width: 45px; height: 45px"
                  />
                  <div class="ms-3">
                    <p class="fw-bold mb-1">Alex Ray</p>
                    <p class="text-muted mb-0">alex.ray@gmail.com</p>
                  </div>
                </div>
              </td>
              <td>
                <p class="fw-normal mb-1">Consultant</p>
                <p class="text-muted mb-0">Finance</p>
              </td>
              <td>
                <span class="badge badge-primary rounded-pill d-inline">Onboarding</span>
              </td>
              <td>Junior</td>
              <td>
                <button
                  type="button"
                  class="btn btn-link btn-rounded btn-sm fw-bold"
                  data-mdb-ripple-color="dark"
                >
                  Edit
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img
                    src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                    class="rounded-circle"
                    alt=""
                    style="width: 45px; height: 45px"
                  />
                  <div class="ms-3">
                    <p class="fw-bold mb-1">Kate Hunington</p>
                    <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                  </div>
                </div>
              </td>
              <td>
                <p class="fw-normal mb-1">Designer</p>
                <p class="text-muted mb-0">UI/UX</p>
              </td>
              <td>
                <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
              </td>
              <td>Senior</td>
              <td>
                <button
                  type="button"
                  class="btn btn-link btn-rounded btn-sm fw-bold"
                  data-mdb-ripple-color="dark"
                >
                  Edit
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- {{ members.members }} -->
      </el-main>
    </el-container>
  </el-container>
</template>
          
          <script lang="ts" setup>
import { Search, Plus, Setting } from '@element-plus/icons-vue'
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import type { UploadInstance } from 'element-plus'
import { memberStore } from '@/stores/member-list.ts'

const members = memberStore()

const memberList = members.fetchMemberStore()
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