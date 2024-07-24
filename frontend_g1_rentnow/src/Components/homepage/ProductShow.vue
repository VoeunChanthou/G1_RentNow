<template>
  <div class="content">
    <div v-if="shopPro" class="container">
      <div
        v-for="product in shopPro"
        :key="product.id"
        class="product-card"
        style="position: relative; overflow: hidden"
      >
      <div v-if="product.status == 'borrowed'" class="status">
        <h4 style="text-align: center;">This product borrowed by other</h4>
      </div>
        <a href="#" class="product-card-center" style="position: relative;">
          <div class="content-overlay">
            <img
              src="../../assets/notLove.png"
              style="width: 30px; height: 30px; position: absolute;"
              alt=""
            />
          </div>
          <img :src="product.image" style="width: 200px; height: 200px; margin: auto;"  alt="" />
        </a>
        <div class="product-card-buttom">
          <img src="../../assets/star.png" alt="" />
          <h4>{{ product.name }}</h4>
        <a :href="/detail/+product.id">Rent - ${{ product.price }}</a>
        </div>
      </div>
    </div>
    <div
      v-if="isShow"
      class="load-more"
      style="width: 100%; display: flex; justify-content: center"
    >
      <button class="btn btn-primary" @click="sumNumber">Load More</button>
    </div>
  </div>
</template>

<script>
import axiosInstance from '@/plugins/axios'
import LoadingShop from '@/Components/loading/LoadingShop.vue'


export default {
  components: {
    LoadingShop
  },
  // propsData: {
  // props: ['products'],
  data() {
    return {
      isShow: false,
      products: [],
      shopPro: [],
      number: 4
    }
  },
  mounted() {
    this.fetchProductStore()
  },
  methods: {
    loadMoreProducts() {
      for (let i = 0; i < this.products.length; i++) {
        if (i < this.number) {
          this.isShow = true
          this.shopPro.push(this.products[i])
        }
        if (this.number >= this.products.length) {
          this.isShow = false
        }
      }
    },

    async fetchProductStore() {
      let data = await axiosInstance.get('/product')
      this.products = data.data.data
      this.loadMoreProducts()
    },

    sumNumber() {
      this.shopPro = []
      this.number += 4
      this.fetchProductStore()
    }
  }
}
</script>

<style scoped>
.container {
  /* background-color: gainsboro; */
  padding: 50px 0;
  /* display: flex;
  justify-content: space-between; */
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-gap: 30px;
}
.product-card {
  /* display: flex;
  gap: 35px;
  flex-direction: column; */
  display: grid;
  gap: 5px;
  grid-template-rows: 70% 25%;
  padding: 10px;
  background: white;
  width: 300px;
  height: 400px;
  box-shadow: 0 0 10px rgba(59, 59, 59, 0.354);
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

.product-card-cente img {
  width: 100px;
}

.product-card-buttom {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.product-card-buttom a {
  text-decoration: none;
  text-align: center;
  padding: 6px;
  color: white;
  background-color: #722cb3;
  border: none;
  width: 200px;
  border-radius: 30px;
}

.content-overlay {
  padding: 5px;
  display: flex;
  justify-content: end;
  background: rgba(216, 216, 216, 0.7);
  position: absolute;
  /* border-radius: 20px; */
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out 0s;
  -moz-transition: all 0.4s ease-in-out 0s;
  transition: all 0.4s ease-in-out 0s;
}

.status{
  padding: 5px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  background: rgba(0, 0, 0, 0.833);
  z-index: 3;
  position: absolute;
  /* border-radius: 20px; */
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
}
.content-overlay:hover {
  opacity: 1;
}
</style>