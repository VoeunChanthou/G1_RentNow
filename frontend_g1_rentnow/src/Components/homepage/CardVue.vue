

<template>
  <id id="app">
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
            <!-- <span
              class="material-symbols-outlined"
              :class="{ 'not-favorite': !isFavorite, isFavorite: 'isFavorite' }"
            >
              <v-icon>{{ !isFavorite ? 'favorite_border' : 'favorite' }}</v-icon>
            </span> -->
          </v-btn>
        </div>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQazjG1jTiHXRqdd7f4pNP1_K_PzyRuLXNIYw&usqp=CAU" class="card-img-top" alt="..." style="height: 9rem" />
      </div>
      <div class="card-body">
        <div class="title">
          <p class="card-name" style="font-weight: bold; color: black;">{{ product.name }}</p>
          <p class="card-price text-danger" style="font-weight: bold;">{{ product.price }}</p>
        </div>
        <p style="color: black;">{{ product.shop.name }}</p>
        <div class="button_card">
          <button
            type="button"
            class="btn btn-light"
            style="background: #f4e065"
            @click="ButtonDetail()"
          >
            Detail
          </button>
          <button
            type="button"
            class="btn btn-light"
            style="background: #a083d5"
            @click="ButtonBorrow()"
          >
            Borrow
          </button>
          <!-- <button><router-link to="/" exact>Borrow</router-link></button> -->
          <!-- <button><router-link to="/CardBorrowVue" exact>Borrow</router-link></button> -->
        </div>
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
  <style>
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
</style>