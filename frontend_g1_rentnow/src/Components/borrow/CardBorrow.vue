<template>
  <div v-if="product.borrow_status == 'borrowed'" class="row justify-content-center mb-2 bg-white">
    <div class="col-md-12 col-xl-11">
      <div class="card shadow-0 border rounded-3">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
              <div class="bg-image hover-zoom ripple rounded ripple-surface">
                <img :src="product.Product.image" class="w-100" />
                <a href="#!">
                  <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15)"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
              <h5>{{ product.Product.name }}</h5>
              <div class="d-flex flex-row">
                <div class="text-danger mb-1 me-2">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
              </div>
              <div class="mt-1 mb-0 text-muted small">
                <span>Borrow Date : {{ product.Borrow_date }}</span>
              </div>
              <div class="mb-2 text-muted small">
                <span>Return Date : {{ product.Return_date }}</span>
              </div>
              <p class="text-truncate mb-4 mb-md-0 text-primary">
                You are {{ product.borrow_status }}
              </p>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
              <div class="d-flex flex-row align-items-center mb-1">
                <h4 class="mb-1 me-1">${{ product.Product.price }}</h4>
                <!-- <span class="text-danger"><s>$20.99</s></span> -->
              </div>
              <h6 class="text-success">{{ product.id }}</h6>
              <div class="d-flex flex-column mt-4">
                <button
                  data-mdb-button-init
                  data-mdb-ripple-init
                  class="btn btn-sm text-white"
                  type="button"
                  data-bs-toggle="offcanvas"
                  data-bs-target="#detailhistory"
                  aria-controls="offcanvasNavbar"
                  style="background: linear-gradient(90deg, #722cb3 30%, #c49be9)"
                >
                  Details
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  <script >
import axiosInstance from '@/plugins/axios'

export default {
  props: ['product'],

  data() {
    return {
      currentDate: ''
    }
  },
  mounted() {
    this.CompareDate()
    this.getCurrentDate()
  },
  methods: {
    getCurrentDate() {
      const today = new Date()
      const year = today.getFullYear()
      const month = String(today.getMonth() + 1).padStart(2, '0')
      const day = String(today.getDate()).padStart(2, '0')
      this.currentDate = `${year}-${month}-${day}`
    },

    async CompareDate() {
      this.getCurrentDate()
      if (this.product.borrow_status == 'borrowed') {
        if (this.product.Return_date == this.currentDate) {
          await axiosInstance.put(`/update/borrow/${this.product.id}`, {
            product_id: this.product.product_id
          })
        }
        const diffInMs = this.product.Return_date - this.currentDate;
        console.log(diffInMs);
      }
    }
  }
}
</script>