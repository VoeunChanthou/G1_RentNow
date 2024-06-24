<script setup lang="ts">
import { Icon } from '@iconify/vue'
</script>
<template>
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
      <div class="btn-class" style="width: 200px; display: flex; justify-content: space-between;">
        <button type="button" class="btn btn-lg text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #691BA5; font-weight: bold;">Login</button>
        <button type="button" class="btn btn-lg text-white" style="background: #FFD800; font-weight: bold;">Register</button>
      </div>
    </div>
  </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: white; border-bottom: 2px solid black;">
  <div class="container-fluid px-5 py-2">
    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="width: 30%; display: flex; justify-content: space-between; align-items: center;">
        <li class="nav-item"><a href="#">Home</a></li>
        <li class="nav-item"><a href="#">Service</a></li>
        <li class="nav-item"><a href="#">Contact Us</a></li>
    </ul>
  </div>
</nav>



</div>
</template>

<style>
a{
  text-decoration: none;
  color: black;
  font-size: 20px;
  font-weight: bold;
}
</style>