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
        <div class="content-product px-5" style="width: 100%; height: 200px; border-radius: 10px; margin-bottom: 20px; background: rgb(235, 235, 235); display: grid; grid-template-columns: 40% 60%;">
          <div class="content-img" style="height: 200px; display: flex; align-items: center; border-right: 2px solid purple;">
            <img :src="product" alt="" style="width: 150px; height: 150px;">
            <div class="content-name" style="margin-left: 30px; height: 150px;">
              <h5>{{ name }}</h5>
              <p>Price: <span>${{ price }}.00</span></p>
            </div>
          </div>
          <div class="content-comment" style="justify-content: center; display: flex; align-items: center;">
            <h3>All Comments of this product</h3>
          </div>
        </div>

        <div
          class="infinite-list-wrapper"
          style="height: 50vh; overflow-y: scroll; overflow-x: hidden"
        >
          <ul v-infinite-scroll="load" class="list" :infinite-scroll-disabled="disabled">
            <div v-for="comment in feedback" :key="comment.id">
              <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-11">
                  <div class="card shadow-0 border rounded-3">
                    <div>
                      <div class="row">
                        <div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-3">
                              <img
                                class="avatar-img rounded-circle shadow m-2"
                                :src="comment.user.profile"
                                alt="avatar"
                                height="50"
                              />
                            </div>
                            <div class="card-body">
                              <div class="d-flex justify-content-between">
                                <div>
                                  <h5>
                                    {{ comment.user.first_name }} {{ comment.user.last_name }}
                                  </h5>
                                  <span>{{ comment.user.email }}</span>
                                </div>
                                <div class="dropdown">
                                  <a
                                    class="btn btn-secondary dropdown-toggle"
                                    href="#"
                                    role="button"
                                    id="dropdownMenuLink"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    >More</a
                                  >
                                  <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                                    <li>
                                      <button
                                        class="btn btn-info w-100"
                                        data-bs-toggle="modal"
                                        data-bs-target="#UpdateComment"
                                        data-bs-whatever="@getbootstrap"
                                        style="margin-bottom: 9px"
                                      >
                                        Edit
                                      </button>
                                    </li>
                                    <li><button class="btn btn-danger w-100">Delete</button></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer">
                            <p class="text-truncate mb-4 mb-md-0" style="font-size: 20px">
                              {{ comment.comment }}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </ul>
          <p v-if="loading">Loading...</p>
          <p v-if="noMore">No more</p>
        </div>
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
import { useRoute } from 'vue-router'

const route = useRoute()

const feedback = ref()
const product = ref()
const price = ref()
const name = ref()
async function fetchFeedback() {
  try {
    const response = await axiosInstance.get(`/product/${route.params.id}`)
    feedback.value = response.data.data.feedback
    product.value = response.data.data.image
    price.value = response.data.data.price
    name.value = response.data.data.name
    // console.log(response.data.data.feedback)
  } catch (error) {
    console.error(error)
  }
}

fetchFeedback()

const count = ref(10)
const loading = ref(false)
const noMore = computed(() => count.value >= 20)
const disabled = computed(() => loading.value || noMore.value)
const load = () => {
  loading.value = true
  setTimeout(() => {
    count.value += 2
    loading.value = false
  }, 2000)
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
.infinite-list-wrapper {
  height: 300px;
  text-align: center;
}
.infinite-list-wrapper .list {
  padding: 0;
  margin: 0;
  list-style: none;
}

.infinite-list-wrapper .list-item {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
  background: var(--el-color-danger-light-9);
  color: var(--el-color-danger);
}
.infinite-list-wrapper .list-item + .list-item {
  margin-top: 10px;
}
</style>




