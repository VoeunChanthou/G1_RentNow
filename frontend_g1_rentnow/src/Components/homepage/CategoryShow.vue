<script setup lang="ts">
</script>
<template>
  <div
    style="
      width: 100%;
      height: 30vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: white;
    "
  >
    <div
      id="myCarousel"
      class="carousel slide container"
      data-bs-ride="carousel"
      style=" display: grid; grid-template-columns: 5% 90% 5%"
    >
      <button
        type="button"
        data-bs-target="#myCarousel"
        data-bs-slide="prev"
        style="
          width: 100%;
          border: none;
          background: none;
          display: flex;
          justify-content: start;
          align-items: center;
        "
      >
      
      <span class="carousel-control-prev-icon" style="color: black; " aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="col-md-3 px-3">
            <div class="card card-body" style="display: grid; grid-template-columns: 30% 70%; background: linear-gradient(90deg, #C49BE9 30%, #F4E065); cursor: pointer;">
              <div style="width: 60px; height: 60px; background: pink; border-radius: 50%"></div>
              <div style=" width: 100%; display: flex; flex-direction: column;">
                <span style="font-weight: bold;">Moto</span>
                <span>This motor</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 px-3">
            <div class="card card-body" style="display: grid; grid-template-columns: 30% 70%; background: linear-gradient(90deg, #C49BE9 30%, #F4E065); cursor: pointer;">
              <div style="width: 60px; height: 60px; background: pink; border-radius: 50%"></div>
              <div style=" width: 100%; display: flex; flex-direction: column;">
                <span style="font-weight: bold;">Moto</span>
                <span>This motor</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 px-3">
            <div class="card card-body" style="display: grid; grid-template-columns: 30% 70%; background: linear-gradient(90deg, #C49BE9 30%, #F4E065); cursor: pointer;">
              <div style="width: 60px; height: 60px; background: pink; border-radius: 50%"></div>
              <div style=" width: 100%; display: flex; flex-direction: column;">
                <span style="font-weight: bold;">Moto</span>
                <span>This motor</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 px-3">
            <div class="card card-body" style="display: grid; grid-template-columns: 30% 70%; background: linear-gradient(90deg, #C49BE9 30%, #F4E065); cursor: pointer;">
              <div style="width: 60px; height: 60px; background: pink; border-radius: 50%"></div>
              <div style=" width: 100%; display: flex; flex-direction: column;">
                <span style="font-weight: bold;">Moto</span>
                <span>This motor</span>
              </div>
            </div>
          </div>
          
        </div>
        <div class="carousel-item">
          <div class="col-md-3 px-3">
            <div class="card card-body" style="display: grid; grid-template-columns: 30% 70%; background: linear-gradient(90deg, #C49BE9 30%, #F4E065); cursor: pointer;">
              <div style="width: 60px; height: 60px; background: pink; border-radius: 50%"></div>
              <div style=" width: 100%; display: flex; flex-direction: column;">
                <span style="font-weight: bold;">Moto</span>
                <span>This motor</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 px-3">
            <div class="card card-body" style="display: grid; grid-template-columns: 30% 70%; background: linear-gradient(90deg, #C49BE9 30%, #F4E065); cursor: pointer;">
              <div style="width: 60px; height: 60px; background: pink; border-radius: 50%"></div>
              <div style=" width: 100%; display: flex; flex-direction: column;">
                <span style="font-weight: bold;">Moto</span>
                <span>This motor</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 px-3">
            <div class="card card-body" style="display: grid; grid-template-columns: 30% 70%; background: linear-gradient(90deg, #C49BE9 30%, #F4E065); cursor: pointer;">
              <div style="width: 60px; height: 60px; background: pink; border-radius: 50%"></div>
              <div style=" width: 100%; display: flex; flex-direction: column;">
                <span style="font-weight: bold;">Moto</span>
                <span>This motor</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 px-3">
            <div class="card card-body" style="display: grid; grid-template-columns: 30% 70%; background: linear-gradient(90deg, #C49BE9 30%, #F4E065); cursor: pointer;">
              <div style="width: 60px; height: 60px; background: pink; border-radius: 50%"></div>
              <div style=" width: 100%; display: flex; flex-direction: column;">
                <span style="font-weight: bold;">Moto</span>
                <span>This motor</span>
              </div>
            </div>
          </div>
         
        </div>
        
      </div>

      <button
        type="button"
        data-bs-target="#myCarousel"
        data-bs-slide="next"
        style="
          width: 100%;
          border: none;
          display: flex;
          background: none;
          justify-content: end;
          align-items: center;
        "
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</template>

<style scoped>
#myCarousel {
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

.carousel-control-prev-icon, .carousel-control-next-icon {
    height: 100%;
    outline: black;
    color: black;
    background-color: rgba(0, 0, 0, 0.3);
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
}
</style>

