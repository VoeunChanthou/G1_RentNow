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
        <section style="background-color: #eee">
          <div class="container py-3">

            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <img
                      :src="profile"
                      alt="avatar"
                      class="rounded-circle img-fluid"
                      style="width: 150px"
                    />
                    <h5 class="my-3">{{ last_name }}  {{ first_name }}</h5>
                    <p class="text-muted mb-1">{{ email }}</p>
                    <div class="d-flex justify-content-center mb-2">
                      <button
                        type="button"
                        data-mdb-button-init
                        data-mdb-ripple-init
                        class="btn btn-outline-primary ms-1"
                      >
                        Message
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                  <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center p-3"
                      >
                        <i class="fas fa-globe fa-lg text-warning"></i>
                        <p class="mb-0">https://mdbootstrap.com</p>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center p-3"
                      >
                        <i class="fab fa-github fa-lg text-body"></i>
                        <p class="mb-0">mdbootstrap</p>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center p-3"
                      >
                        <i class="fab fa-twitter fa-lg" style="color: #55acee"></i>
                        <p class="mb-0">@mdbootstrap</p>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center p-3"
                      >
                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac"></i>
                        <p class="mb-0">mdbootstrap</p>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center p-3"
                      >
                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998"></i>
                        <p class="mb-0">mdbootstrap</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ first_name }}  {{ last_name }}</p>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">First Name</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ first_name }}</p>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Last Name</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{last_name}}</p>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ email }}</p>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Mobile</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">(098) 765-4321</p>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                      <div class="card-body">
                        <p class="mb-4">
                          <span class="text-primary font-italic me-1">Porduct</span>
                          Status
                        </p>
                        <p class="mb-1" style="font-size: 0.77rem">Bike</p>
                        <div class="progress rounded" style="height: 5px">
                          <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 80%"
                            aria-valuenow="80"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: 0.77rem">Car</p>
                        <div class="progress rounded" style="height: 5px">
                          <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 72%"
                            aria-valuenow="72"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: 0.77rem">Camping</p>
                        <div class="progress rounded" style="height: 5px">
                          <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 89%"
                            aria-valuenow="89"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                      <div class="card-body">
                        <p class="mb-4">
                          <span class="text-primary font-italic me-1">Borrow</span>
                          Status
                        </p>
                        <p class="mb-1" style="font-size: 0.77rem">borrowed</p>
                        <div class="progress rounded" style="height: 5px">
                          <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: 80%"
                            aria-valuenow="80"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </el-main>
    </el-container>
  </el-container>
</template>
        
<script lang="ts" setup>
import { Search, Plus, Setting } from '@element-plus/icons-vue'
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import axiosInstance from '@/plugins/axios'
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const first_name = ref();
const last_name = ref();
const route = useRoute();
const email = ref();
const profile = ref();

async function fetchMemberData() {
  try {
    const response = await axiosInstance.get(`/show/member/${route.params.id}`)
    first_name.value = response.data.data.member.first_name
    last_name.value = response.data.data.member.last_name
    email.value = response.data.data.member.email
    profile.value = response.data.data.member.profile
  } catch (error) {
    console.error(error)
  }
}
fetchMemberData()
// onMounted(fetchMemberData)

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