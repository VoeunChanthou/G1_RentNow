<template>
  <PopupDelete />
    <div v-if="product.borrow_status == 'true'" class="row justify-content-center mb-2 bg-white">
      <div class="col-md-12 col-xl-11">
        <div class="card shadow-0 border rounded-3 ">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img :src="product.Product.image"
                    class="w-100" />
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
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
                  <span>Borrow Date : {{ product.Return_date }}</span>
                 
                </div>
                <p class="text-truncate mb-4 mb-md-0 text-primary">
                You are  {{ product.borrow_status }}
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">${{product.Product.price}}</h4>
                  <!-- <span class="text-danger"><s>$20.99</s></span> -->
                </div>
                <h6 class="text-success">{{ product.id }}</h6>
                <div class="d-flex flex-column mt-4">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-sm text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#detailhistory" aria-controls="offcanvasNavbar" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);">Details</button>
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger btn-sm mt-2 " type="button" data-bs-toggle="modal" href="#exampleModalToggle" role="button" @click="this.$emit('idproduct', product.id)" >
                     Delete 
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <DetailHistory />
</template>
<script >
import DetailHistory from "./DetailHistory.vue";
import PopupDelete from "./PopupDelete.vue";
export default {
  components: {
    DetailHistory,
    PopupDelete
  },
  props: ['product']
}

</script>