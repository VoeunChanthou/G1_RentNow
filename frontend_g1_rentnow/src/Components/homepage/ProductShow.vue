<template>
  <div class="container">
    <!-- simple-card -->
    <div class="product-card">
      <div class="prodcut-card-top">
        <img src="../../assets/notLove.png" alt="" />
      </div>
      <div class="product-card-center">
        <img src="../../assets/camera.png" alt="" />
      </div>
      <div class="product-card-buttom">
        <img src="../../assets/star.png" alt="" />
        <h4>Bianchi magma 9s</h4>
        <button>Rent - $135</button>
      </div>
    </div>
    <!-- simple-card -->

    <!-- promotion-card -->
    <div class="product-card">
      <div class="prodcut-card-top-promotion">
        <div class="btn-promotion">
          <h4><b>60% OFF</b></h4>
        </div>
        <img src="../../assets/notLove.png" alt="" />
      </div>

      <div class="product-card-center">
        <img src="../../assets/camera.png" alt="" />
      </div>
      <div class="product-card-buttom">
        <img src="../../assets/star.png" alt="" />
        <h4>Bianchi magma 9s</h4>
        <button>Rent - $135</button>
      </div>
    </div>
    <!-- promotion-card -->

    <!-- simple-card -->
    <div class="product-card">
      <div class="prodcut-card-top">
        <img src="../../assets/notLove.png" alt="" />
      </div>
      <div class="product-card-center">
        <img src="../../assets/camera.png" alt="" />
      </div>
      <div class="product-card-buttom">
        <img src="../../assets/star.png" alt="" />
        <h4>Bianchi magma 9s</h4>
        <button>Rent - $135</button>
      </div>
    </div>
    <!-- simple-card -->

    <!-- simple-card -->
    <div class="product-card">
      <div class="prodcut-card-top">
        <img src="../../assets/notLove.png" alt="" />
      </div>
      <div class="product-card-center">
        <img src="../../assets/camera.png" alt="" />
      </div>
      <div class="product-card-buttom">
        <img src="../../assets/star.png" alt="" />
        <h4>Bianchi magma 9s</h4>
        <button>Rent - $135</button>
      </div>
    </div>
    <!-- simple-card -->

  </div>
</template>

<script>
export default {}
</script>

<style scoped>
.container {
  /* background-color: gainsboro; */
  padding: 50px 0;
  display: flex;
  justify-content: space-between;

}
.product-card {
  display: flex;
  gap: 35px;
  flex-direction: column;
  padding: 30px;
  background: white;
  width: 300px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.285);
}

.prodcut-card-top {
  display: flex;
  justify-content: end;
}
.prodcut-card-top-promotion {
  display: flex;
  justify-content: space-between;
}

.btn-promotion {
    color: red;
}

.product-card-center {
  display: flex;
  justify-content: center;
}

.product-card-buttom {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.product-card-buttom button {
  padding: 6px;
  color: white;
  background-color: #722cb3;
  border: none;
  width: 200px;
  border-radius: 30px;
}
</style>