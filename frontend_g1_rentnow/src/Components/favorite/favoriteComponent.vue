

<template>
  <id id="app" v-if="product != ''">
    <div class="cards" style="height: 18rem; width: 12rem">
      <div class="card-1">
        <div class="icon">
          <p class="day">200 day</p>
          <v-btn @click="unfavoSubmit(id)" style="cursor: pointer;">
            <i class="material-icons" :class="{ 'not-favorite': !isFavorite, isFavorite: 'isFavorite' }" style=" color: purple;"><v-icon>{{ !isFavorite ? 'favorite_border' : 'favorite' }} </v-icon></i >
          </v-btn>
        </div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQazjG1jTiHXRqdd7f4pNP1_K_PzyRuLXNIYw&usqp=CAU"
          class="card-img-top"
          alt="..."
          style="height: 9rem"
        />
      </div>
      <div class="card-body">
        <div class="title">
          <p class="card-name" style="font-weight: bold; color: black">{{ product.name }}</p>
          <p class="card-price text-danger" style="font-weight: bold">{{ product.price }}</p>
        </div>
        <p style="color: black">ksd</p>
        <div class="button_card">
          <a type="button" class="btn btn-light" style="background: #f4e065" :href="/detail/ + product.id" >
            Detail
          </a>
          <button type="button" alert="jej" class="btn btn-light" style="background: #a083d5">Borrow</button>
        </div>
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

form {
  border: 1px solid black;
  border-radius: 10px;
  box-shadow: 10px 10px 2px rgba(0, 0, 0, 0.144);
}
</style>