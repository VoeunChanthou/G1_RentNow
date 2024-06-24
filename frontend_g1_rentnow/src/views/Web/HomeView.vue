<script setup lang="ts">
// import $ from 'jquery'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import CategoryShow from '@/Components/homepage/CategoryShow.vue'
import WebLoginVue from '@/Components/homepage/WebLogin.vue';
import PopupRegisterVue from '@/Components/homepage/PopupRegister.vue';
import type { componentSizeMap } from 'element-plus';
import {useAuthStore} from '@/stores/auth-store.ts'
const AuthUSer = useAuthStore()
</script>

<template>
  <WebLayout>
    <div style="height: 70vh; display: flex">
      <div
        class="head-right px-5"
        style="
          width: 50%;
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: space-evenly;
        "
      >
        <div
          class="content-right"
          style="
            width: 75%;
            height: 45vh;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
          "
        >
          <div class="top-text">
            <h1 style="font-size: 50px; font-weight: bold">
              <span style="color: #ffd800; font-weight: bold">Why</span> buy when you can
              <span style="color: #691ba5; font-weight: bold">borrow</span> me?
            </h1>
          </div>
          <div class="second-text">
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum tempore quam impedit
              minus iure dolorum voluptatum quos molestias eligendi cumque, odio vero corporis
              delectus fugiat unde quod deserunt similique aut.
            </p>
          </div>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="Search me..."
              aria-label="Search me..."
              aria-describedby="button-addon2"
              style="border: solid 2px linear-gradient(144deg, #722cb3 50%, #c49be9)"
            />
            <button
              class="btn btn-outline-secondary text-white"
              type="button"
              id="button-addon2"
              style="background: linear-gradient(180deg, #722cb3 20%, #c49be9)"
            >
              Search
            </button>
          </div>
        </div>
      </div>
      <div class="head-left" style="height: 100%; width: 50%; display: flex; align-items: center">
        <img src="../../assets/image-removebg-preview.png" alt="" style="width: 70%" />
      </div>
      </div>
      </WebLayout>
      
  <!-- register popup  -->
  <PopupRegisterVue></PopupRegisterVue>

  <!-- login form -->
  <WebLoginVue></WebLoginVue>

  <!-- category show -->
  <CategoryShow></CategoryShow>

</template>


