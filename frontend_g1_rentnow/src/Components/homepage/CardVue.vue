<!-- 

<template>
  
  <id id="app" v-if="product != ''">
    <div class="cards" style="height: 18rem; width: 12rem">
      <div class="card-1">
        <div class="icon">
          <p class="day">200 day</p>
          <v-btn @click="isFavorite = !isFavorite">
            <i
              class="material-icons"
              :class="{ 'not-favorite': !isFavorite, isFavorite: 'isFavorite' }"
              ><v-icon>{{ !isFavorite ? 'favorite_border' : 'favorite' }}</v-icon></i
            >
         
          </v-btn>
        </div>
        <img :src="product.image" class="card-img-top" alt="..." style="height: 9rem" />
      </div>
      <div class="card-body">
        <div class="title">
          <p class="card-name" style="font-weight: bold; color: black;">{{ product.name }}</p>
          <p class="card-price text-danger" style="font-weight: bold;">{{ product.price }}</p>
        </div>
        <p style="color: black;">{{ product.shop.name }}</p>
        <div class="button_card">
          <a
            type="button"
            class="btn btn-light"
            style="background: #f4e065"
            :href="/detail/+product.id"
          >
            Detail
        </a>
          <button
            type="button"
            class="btn btn-light"
            style="background: #a083d5"
            @click="ButtonBorrow()"
          >
            Borrow
          </button> -->
          <!-- <button><router-link to="/" exact>Borrow</router-link></button> -->
          <!-- <button><router-link to="/CardBorrowVue" exact>Borrow</router-link></button> -->
        <!-- </div>
      </div>
    </div>
  </id>
  <div class="card_button" v-if="showNewForm">
    <form style="width: 25rem" @submit.prevent="handleSubmitNewForm">
      <CardBorrowVue></CardBorrowVue>
    </form>
  </div>
</template>
    
<script>
import CardBorrowVue from './CardBorrowVue.vue'
export default {
  name: 'CardVue',
  components: {
    CardBorrowVue
  },
  props: ['product'],
  data() {
    return {
      showNewForm: false,
      isFavorite: false
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
    }
  }
}
</script>
  <style scoped>
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

.isFavorite {
  color: purple;
}

.not-favorite {
  color: rgb(124, 124, 124);
}
form {
  border: 1px solid black;
  border-radius: 10px;
  box-shadow: 10px 10px 2px rgba(0, 0, 0, 0.144);
}
</style> -->


<template>

    <!-- promotion-card -->
    <div class="product-card" style="height: auto;">
      <div class="prodcut-card-top-promotion">
        <div class="btn-promotion">
          <h4 style="font-size: 16px;"><b>60% OFF</b></h4>
        </div>
        <img src="../../assets/notLove.png" alt="" width="25" height="25" />
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
</template>

<script>

export default {
  name: 'CardVue',
  props: ['product'],
  data() {
    return {
      showNewForm: false,
      isFavorite: false
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
    }
  }
}
</script>

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