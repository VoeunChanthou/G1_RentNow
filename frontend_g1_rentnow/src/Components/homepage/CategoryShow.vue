<script setup lang="ts">
import { Icon } from '@iconify/vue'
</script>

<template>
  <div class="container">
    <div class="category-product">
      <!-- left -->
      <div class="category-left">
        <h2><b style="color: #722CB3;">CATEGORIES OF PRODUCT</b></h2>
      </div>
      <!-- left -->

      <!-- center -->
       <div class="category-center">
       </div>
      <!-- center -->

      <!-- right -->
      <div class="category-right">
        <div class="dropdown">
        <a style="background: #ffd800; color: white; padding: 10px;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <b>Categories of Product</b>
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Bike</a></li>
          <li><a class="dropdown-item" href="#">Motor</a></li>
          <li><a class="dropdown-item" href="#">Car</a></li>
          <li><a class="dropdown-item" href="#">Camera</a></li>
        </ul>
      </div>
      <!-- right -->

    </div>
  </div>
  </div>
</template>


<style scoped>


.category-product{
  display: flex;
  justify-content: space-between;
}
</style>

