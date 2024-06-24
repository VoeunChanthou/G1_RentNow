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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Location</a>
        </li>
      </ul>
      <div class="d-flex">
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form> -->
        <!-- not account start -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-if="!AuthUSer.user" >
        <li class="nav-item">
          <a class="nav-link active text-danger" aria-current="page" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-success" aria-current="page" href="/register">Register</a>
        </li>
      </ul>
      <!-- not account END -->
      <!-- profile start  -->
      <div class="dropdown ms-1 ms-lg-0" v-if="AuthUSer.user">
				<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
					<img class="avatar-img rounded-circle" src="../assets/3135715.png" alt="avatar" height="40">
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
								<p class="small m-0">{{ AuthUSer.user.eamil }}</p>
							</div>
						</div>
						<hr>
					</li>
					<!-- Links -->
					<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
					<li><button class="dropdown-item bg-danger-soft-hover" @click ="onSubmit"><i class="bi bi-power fa-fw me-2"></i>Sign Out</button></li>
					<li> <hr class="dropdown-divider"></li>
					<!-- Dark mode switch START -->
					<li>
						<div class="modeswitch-wrap" id="darkModeSwitch">
							<div class="modeswitch-item">
								<div class="modeswitch-icon"></div>
							</div>
							<span>Dark mode</span>
						</div>
					</li> 
          <!-- Dark mode switch END -->
				</ul>
			</div>
      <!-- profile END -->
      </div>
    </div>
  </div>
</nav>
</template>
<script>
 
</script>
