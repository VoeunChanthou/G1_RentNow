<template>
  <div class="container">
    <h1>Borrow The Product</h1>
    <p>If you want to borrow my product for use, you can follow the instructions.</p>
    <h4 class="borrow">
      MotorBike Borrow:
      <input
        type="number"
        class="form-control"
        placeholder="0"
        min="0"
        style="width: 8rem"
        v-model="cards.motorbike"
      />
    </h4>
    <h4>Price: 1/$</h4>
    <button type="button" class="btn btn-success" style="background: #f4e065" @click="Borrow()">
      Order Now
    </button>
    <hr />
    <h4>Total :{{ cards.total + '.00$' }}</h4>
  </div>
</template>
<script>
export default {
  name: 'CardBorrowVue',
  props: ['product'],
  data() {
    return {
      cards: [
        {
          motorbike: 0,
          total: 0
        }
      ]
    }
  },
  methods: {
    Borrow() {
      if (!this.cards.motorbike) {
        alert('Please input number')
        return false
      } else {
        this.cards.total = this.cards.motorbike * 15
      }
    }
  }
}
</script>