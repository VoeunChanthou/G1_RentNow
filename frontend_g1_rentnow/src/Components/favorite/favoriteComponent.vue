

<template>
  <id id="app" v-if="product != ''">
    <div class="product-card" style="position: relative; overflow: hidden">
      <div class="product-card-center" style="position: relative">
        <div class="content-overlay">
          <div class="prodcut-card-top-promotion">
            <v-btn @click="unfavoSubmit(id)" style="cursor: pointer">
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
  </id>
</template>
  <script>
import axiosInstance from '@/plugins/axios'

export default {
  name: 'CardVue',
  props: ['product', 'id'],
  data() {
    return {
      showNewForm: false,
      isFavorite: false,
      isFavo: ''
    }
  },

  methods: {
    // ... other methods
    unfavoSubmit(value) {
      axiosInstance
        .delete(`/unfavorite/${value}`)
        .then((response) => {
          location.reload()
        })
        .catch((error) => {
          console.error(error)
        })
    }
  }
}
</script>
    <!-- <style scoped>
.cards {
  /* border: 1px solid black; */
  border-radius: 10px;
  margin-bottom: 50px;
  box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.144);
}
p,
.btn {
  color: White;
}

.icon {
  width: 100%;
  padding: 10px;
  position: absolute;
}
.borrow,
.icon,
.button_card,
.title {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.card-body {
  margin: 10px;
}
.day {
  background: rgba(0, 0, 0, 0.37);
  padding: 10px;
  border-radius: 10px;
  box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.144);
}

.card-1 {
  width: 100%;
  border-radius: 10px;
  /* box-shadow: 0 5px 2px rgba(0, 0, 0, 0.144); */
  position: relative;
  overflow: hidden;
}

.material-symbols-outlined {
  vertical-align: middle;
}

form {
  border: 1px solid black;
  border-radius: 10px;
  box-shadow: 10px 10px 2px rgba(0, 0, 0, 0.144);
}
</style> -->

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
</style>