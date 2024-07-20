<template>
    <!-- <div class="row"> -->
      <div class="col-md-12 col-xl-12 mb-3">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img :src="product.image"
                    class="w-100" />
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5>{{ product.name }}</h5>
                <div class="mt-1 mb-0 text-muted small">
                  <span>{{ product.shop_id }}</span>
                </div>
                <p class="text-truncate mb-4 mb-md-0">
                  There are many variations of passages of Lorem Ipsum available, but the
                  majority have suffered alteration in some form, by injected humour, or
                  randomised words which don't look even slightly believable.
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">${{ product.price }}</h4>
                  <span class="text-danger">${{ product.price / 2 }}</span>
                </div>
                <div class="d-flex flex-column mt-12">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm" type="button"><a :href="`/my/product/detail/${product.id}`" style="text-decoration: none; color: white;">Details</a></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->

</template>

<script>
    export default{
        name: 'ProductCard',
        props: ['product'],
        data() {
            return {
                // your data
            }
        },
        computed: {
            // your computed properties
        },
        mounted() {
            // your mounted lifecycle hook
        },
        methods: {
            // your methods
        }
    }
</script>

<style>

</style>