

<template>
  <id id="app" v-if="product != ''">
    <div class="product-card" style="height: auto;">
      <div class="prodcut-card-top-promotion">
        <div class="btn-promotion">
          <h4 style="font-size: 16px;"><b>60% OFF</b></h4>
        </div>
        <v-btn @click="unfavoSubmit(id)" style="cursor: pointer;">
            <!-- <i class="material-icons" :class="{ 'not-favorite': !isFavorite, isFavorite: 'isFavorite' }" style=" color: purple;"><v-icon>{{ !isFavorite ? 'favorite_border' : 'favorite' }} </v-icon></i > -->
              <img src="../../assets/notLove.png" alt="" width="25" height="25" />
          </v-btn>
      </div>

      <div class="product-card-center">
        <img :src="product.image" alt="" width="200" height="100" />
      </div>
      <div class="product-card-buttom">
        <img src="../../assets/star.png" alt="" />
        <h4>{{ product.name }}</h4>
        <button><a :href="/detail/+product.id">Rent - ${{ product.price }}</a></button>
      </div>
    </div>
    
  </id>
</template>
  <script>
import axiosInstance from '@/plugins/axios';

  
export default {
  name: 'CardVue',
  props: ['product', 'id'],
  data() {
    return {
      showNewForm: false,
      isFavorite: false,
      isFavo: '',
    }
  },

  methods: {
    // ... other methods
    unfavoSubmit(value) {
      axiosInstance.delete(`/unfavorite/${value}`)
      .then(response => {
        location.reload();
      })
      .catch(error => {
        console.error(error)
      })
    },
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
  display: flex;
  gap: 35px;
  flex-direction: column;
  padding: 30px;
  background: white;
  width: 230px;
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

.product-card-buttom button {
  padding: 6px;
  color: white;
  background-color: #722cb3;
  border: none;
  width: 200px;
  border-radius: 30px;
}

a{
  color: white;
  text-decoration: none;
}
</style>