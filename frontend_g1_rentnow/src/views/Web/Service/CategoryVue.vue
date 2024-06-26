<template>
    <div>
        <h1>hello</h1>
    </div>
</template>


<script>

import {useProductStore} from '';

export default {
  data() {
    return {
      products: useProductStore(),
    }
  },
  mounted() {
    this.fetchProduct()
  },
  methods: {
    fetchProduct() {
      this.products.fetchProduct()
    }
  }
}

</script>


<style>


</style>