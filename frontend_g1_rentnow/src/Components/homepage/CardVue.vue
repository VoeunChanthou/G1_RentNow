<template>
  <!-- promotion-card -->
  <div
          v-if="isCancel"
          class="alert alert-success alert-dismissible fade show"
          style="position: absolute; top: 90%; left: 70%"
          role="alert"
        >
          You add <strong>{{ product.name }}</strong> to favorite.
          <button
            type="button"
            @click="unMessage"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
          ></button>
        </div>
        <div class="product-card" style="position: relative; overflow: hidden">
          <div v-if="product.status == 'borrowed'" class="status">
          <h4 style="text-align: center;">This product borrowed by other</h4>
        </div>
   
    <div class="product-card-center" style="position: relative">
      <div class="content-overlay">
        
        <div class="prodcut-card-top-promotion">
          <v-btn @click="favoSubmit(product.id)" style="cursor: pointer">
            <img src="../../assets/notLove.png" alt="" width="25" height="25" />
          </v-btn>
        </div>
      </div>
      <img :src="product.image" style="width: 100%; height: 100%" alt="" />
    </div>
    <div class="product-card-buttom">
      <img src="../../assets/star.png" alt="" />
      <h4>{{ product.name }}</h4>
      <a :href="/detail/ + product.id">Rent - ${{ product.price }}</a>
    </div>
  </div>
</template>

<script>
import CardBorrowVue from './CardBorrowVue.vue'
import axiosInstance from '@/plugins/axios'

export default {
  name: 'CardVue',
  props: ['product'],
  data() {
    return {
      showNewForm: false,
      isFavorite: false,
      isFavo: '',
      isCancel: false
    }
  },
  methods: {
    Select() {
      this.selectedForm === !this.selectedForm
    },
    SelectCard() {
      console.log(this.cards)
    },
    ButtonBorrow() {
      this.showNewForm = !this.showNewForm
    },
    handleSubmitNewForm() {
      console.log('New Form Data:', this.cards)
    },
    toggleIcon() {
      this.isFavorite === !this.isFavorite
    },
    favoSubmit(value) {
      axiosInstance
        .post('/favorite', { product_id: value })
        .then((response) => {
          console.log(response)
        })
        .catch((error) => {
          console.error(error)
        })
      this.isCancel = true
      this.isFavorite = true
    },
    unMessage() {
      this.isCancel = false
      console.log(value)
    }
  }
}
</script>

<style scoped>
.product-card {
  /* display: flex;
  gap: 35px;
  flex-direction: column; */
  display: grid;
  gap: 5px;
  grid-template-rows: 70% 25%;
  padding: 10px;
  background: white;
  width: 230px;
  height: 340px;
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
  font-size: 20px;
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
.content-overlay:hover {
  opacity: 1;
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
</style>