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
          
            <div class="container-fluid mb-5">
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header text-center bg-black text-white">
            <h3>All Messages</h3>
          </div>
          <div class="card-body">
            <div v-if="selectMessages === 'messages'">
              <div
                class="d-flex align-items-center mb-3 cursor-pointer"
                v-for="(person, index) in people"
                :key="index"
                @click="showReplyForm(person)"
              >
                <img
                  class="avatar-img rounded-circle shadow mr-3"
                  :src="person.profile"
                  alt="avatar"
                  height="50"
                />
                <div>
                  <h5>{{ person.first_name }} {{ person.last_name }}</h5>
                  <p>hello world</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-if="selectedMessage" class="col-md-7">
        <div class="card">
          <div class="card-header">
            <div class="d-flex flex-column align-items-start">
              <div class="d-flex align-items-center mb-3" v-if="selectedMessage">
                <img
                  class="avatar-img rounded-circle shadow mr-3"
                  :src="selectedMessage.profile"
                  alt="avatar"
                  height="50"
                />
                <div>
                  <h5>{{ selectedMessage.first_name }} {{ selectMessages.last_name }}</h5>
                </div>
              </div>

            </div>
          </div>
          <div v-if="selectedMessage" class="card-body">
            
            <div  class="content-test" style="width: 100%; height: 60vh; margin-bottom: 10px; padding: 10px; overflow-y: scroll;">
              <div v-for="mess in allmessages" :key="mess.id" class="div">
              <div v-if="mess.user_id == selectedMessage.id" class="content-message py-2">
                <img
                  class="avatar-img rounded-circle shadow mr-3"
                  :src="mess.user.profile"
                  alt="avatar"
                  height="50"
                />
                <span style="background: rgb(154, 218, 244); padding: 5px; border-radius: 10px; width: auto;">{{ mess.text }}</span>
              </div>
              <div v-else class="content-message py-2" style="display: flex; justify-content: end; align-items: center;">
                <span style="background: rgb(154, 218, 244); padding: 5px; border-radius: 10px; width: auto; margin-right: 5px;">{{ mess.text }}</span>
                <img
                  class="avatar-img rounded-circle shadow mr-3"
                  :src="mess.user.profile"
                  alt="avatar"
                  height="50"
                />
              </div>
              </div>
            </div>
            <form @submit.prevent="sendMessages(selectedMessage.id)">
                <div class="form-floating">
                <textarea
                  v-model="message"
                  class="form-control"
                  placeholder="Leave a comment here"
                  id="floatingTextarea2"
                  style="height: 100px;"></textarea>
                <label for="floatingTextarea2">Write message....</label>
              </div>
              <div class="d-flex justify-content-end" style="margin-top: 5%; margin-bottom: 5%">
                <button class="btn btn-primary" @click="sendReply">Send</button>
              </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  
  
const route = useRoute();
const selectMessages = ref('messages')
const selectedMessage = ref(null)
const message=ref('');
const people = ref('');
const allmessages = ref();




const showReplyForm = (person) => {
  selectedMessage.value = person
  fetchMessages(person.id)
}


async function fetchMessages(id: string) {
  try {
    const response = await axiosInstance.get(`/get/message/personal/${id}`)
    allmessages.value = response.data.data
    console.log(id);
  } catch (error) {
    console.error(error)
  }
}

async function sendMessages(id: string) {
  try {
    const response = await axiosInstance.post('/add/message', {
      'shop_id': id,
      'text': message.value
    });
    message.value = ''
    fetchMessages(id);
    console.log(response);
  } catch (error) {
    console.error(error)
  }
}




async function fectShop(){
  try {
    const response = await axiosInstance.get('/get/user/meessage/shop')
    people.value = response.data
  } catch (error) {
    console.error(error)
  }
}

fectShop();


 
  
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