<template>
  <WebHeaderMenu />
  <div class="container-fluid h-100">
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
  <div class="container-fluid px-5" style="margin-top: 100px;">
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
                v-for="(message, index) in messages"
                :key="index"
                @click="showReplyForm(message)"
              >
                <img
                  class="avatar-img rounded-circle shadow mr-3"
                  src="../../assets/3135715.png"
                  alt="avatar"
                  height="50"
                />
                <div>
                  <h5>{{ message.name }}</h5>
                  <p>{{ message.message }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7">
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
                  <h5>{{ selectedMessage.name }}</h5>
                  <p>{{ selectedMessage.message }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-floating">
              <textarea
                class="form-control"
                placeholder="Leave a comment here"
                id="floatingTextarea2"
                style="height: 100px"
              ></textarea>
              <label for="floatingTextarea2">Write message....</label>
            </div>
            <div class="d-flex justify-content-end" style="margin-top: 5%; margin-bottom: 5%">
              <button class="btn btn-primary" @click="sendReply">Send</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { ref, computed } from 'vue'
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'

// Define reactive variables
const selectMessages = ref('messages')
const selectedMessage = ref(null)
const messageText = ref('')
const messages = ref([
  {
    name: 'Layhor',
    message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab rem minus, illu'
  },
  {
    name: 'te za',
    message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
  },
  {
    name: 'Adty',
    message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
  }
])
const showMessage = computed(() => {
  return messageText.value
})
const showReplyForm = (message) => {
  selectedMessage.value = message
}
const sendReply = () => {
  messageText.value = ''
}
</script>

<style>
</style>