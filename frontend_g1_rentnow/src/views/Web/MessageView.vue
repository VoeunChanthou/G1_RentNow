<template>
  <WebHeaderMenu />
  <div class="container-fluid h-100 bg-white">
    <div class="row h-100 align-items-center">
      <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 text-primary font-weight-bold" style="font-weight: bold">
          <span class="text-warning">We</span>come To
          <span class="text-purple">Chat</span>
        </h1>
        <p class="lead">Connect with product owner and share your thoughts.</p>
      </div>
      <div class="col-md-6 d-flex justify-content-center align-items-center">
        <img
          src="../../assets/message.png"
          alt=""
          class="img-fluid w-75 animate__animated animate__pulse animate__infinite"
        />
      </div>
    </div>
  </div>

  <div class="container-fluid px-5 bg-white pb-5">
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
                  src="../../assets/3135715.png"
                  alt="avatar"
                  height="50"
                />
                <div>
                  <h5>{{ person.first_name }} {{ person.last_name }}</h5>
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
                  src="../../assets/3135715.png"
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
  <FooterMenuVue />
</template>
<script setup lang="ts">
import { ref, computed } from 'vue'
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
import FooterMenuVue from '@/Components/homepage/FooterMenu.vue'
import axiosInstance from '@/plugins/axios';


// Define reactive variables
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
  } catch (error) {
    console.error(error)
  }
}




async function fectShop(){
  try {
    const response = await axiosInstance.get('/get/shop/user')
    people.value = response.data
  } catch (error) {
    console.error(error)
  }
}

fectShop();

</script>

<style>
</style>