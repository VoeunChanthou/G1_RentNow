<script setup lang="ts">
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'

import {useAuthStore} from '@/stores/auth-store.ts'
const AuthUSer = useAuthStore()
const router = useRouter()
const onSubmit = (async () => {
  try {
    const { data } = await axiosInstance.post('/logout')
    localStorage.setItem('access_token', data.access_token)
    location.reload()
    router.push('/')
  } catch (error) {
    console.warn('Error')
  }
})
</script>
<template>
  <!-- Button trigger modal -->
<!-- Modal -->

  <div class="content" style="width: 100%;">
  <header class="navbar navbar-expand-lg navbar-light bg-light" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);">
  <div class="container-fluid px-5 py-2">
    <img src="../assets/image 62.png" alt="" style="padding-right: 100px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px; font-weight: bold;">
            All location
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Phnom Penh</a></li>
            <li><a class="dropdown-item" href="#">Kompong Thom</a></li>
            <li><a class="dropdown-item" href="#">Kompong Cham</a></li>
            <li><a class="dropdown-item" href="#">Kampot</a></li>
          </ul>
        </li>
      </ul>
      <div v-if="!AuthUSer.user" class="btn-class" style="width: 200px; display: flex; justify-content: space-between;">
        <a type="button" class="btn btn-lg text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" href="/" style="background: #691BA5; font-weight: bold;">Login</a>
        <a type="button" class="btn btn-lg text-white" data-bs-toggle="modal" data-bs-target="#popupRegister" href="/register" style="background: #FFD800; font-weight: bold;">Register</a>
        
      </div>
      
      <div class="dropdown ms-1 ms-lg-0 " v-if="AuthUSer.user" >
        <a class="avatar avatar-sm p-0 d-flex  align-items-center" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
          <h6 class="text-warning">Hi_</h6>
          <h6> {{ AuthUSer.user.first_name  }}</h6>
					<img class="avatar-img rounded-circle" src="../assets/3135715.png" alt="avatar" height="60" style="margin: 8px;">
				</a>
				<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
          <!-- Profile info -->
					<li class="px-3">
            <div class="d-flex align-items-center">
              <!-- Avatar -->
							<div class="avatar me-3">
                <img class="avatar-img rounded-circle shadow" src="../assets/3135715.png" alt="avatar" height="40">
							</div>
							<div>
                <a class="h6" href="#">{{ AuthUSer.user.first_name }} {{ AuthUSer.user.last_name }}</a>
								<p class="small m-0">{{ AuthUSer.user.email }}</p>
							</div>
						</div>
						<hr>
					</li>
					<!-- Links -->
					<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
					<li><a class="dropdown-item" href="/history"><i class="bi bi-person fa-fw me-2"></i>My borrow</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
					<li><button class="dropdown-item " @click ="onSubmit"><i class="bi bi-power fa-fw me-2"></i>Sign Out</button></li>
					<li> <hr class="dropdown-divider"></li>
					<!-- Dark mode switch START -->
          <!-- Dark mode switch END -->
				</ul>
			</div>
      
    </div>
  </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: white; border-bottom: 2px solid black;">
  <div class="container-fluid px-5 py-2">
    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="width: 30%; display: flex; justify-content: space-between; align-items: center;">
        <li class="nav-item"><a href="/">Home</a></li>
        <li class="nav-item"><a href="/service">Service</a></li>
        <li class="nav-item"><a href="/aboutUs">About Us</a></li>
    </ul>
    <li v-if="AuthUSer.user" class="nav-item" style="list-style-type: none; margin-right: 10px;"><a href="#"><Icon icon="ri:heart-fill" width="40" height="40"  style="color: #940065" /></a></li>
    <li v-if="AuthUSer.user" class="nav-item" style="list-style-type: none;"><a href="/message"><Icon icon="wpf:message-outline" width="52" height="40"  style="color: #940065" /></a></li>
  </div>
</nav>
</div>

</template>

<style scoped>
a{
  text-decoration: none;
  color: black;
  font-size: 20px;
  font-weight: bold;
}

.dropdown>ul>li>a,  button{
  font-size: 15px;
  font-weight: 400;
}
</style>
  