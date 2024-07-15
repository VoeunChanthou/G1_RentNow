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
/* #myCarousel {
  margin-top: 50px;
}

@media (max-width: 768px) {
  .carousel-inner .carousel-item > div {
    display: none;
  }

  .carousel-inner .carousel-item > div:first-child {
    display: block;
  }
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 100%;
  outline: black;
  color: black;
  background-color: black;
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-start,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
  display: flex;
}

@media (min-width: 768px) {
  .carousel-inner .carousel-item-right.active,
  .carousel-inner .carousel-item-next,
  .carousel-item-next:not(.carousel-item-start) {
    transform: translateX(25%) !important;
  }

  .carousel-inner .carousel-item-left.active,
  .carousel-item-prev:not(.carousel-item-end),
  .active.carousel-item-start,
  .carousel-item-prev:not(.carousel-item-end) {
    transform: translateX(-25%) !important;
  }

  .carousel-item-next.carousel-item-start,
  .active.carousel-item-end {
    transform: translateX(0) !important;
  }

  .carousel-inner .carousel-item-prev,
  .carousel-item-prev:not(.carousel-item-end) {
    transform: translateX(-25%) !important;
  }
} */

.category-product{
  display: flex;
  justify-content: space-between;
}
</style>

