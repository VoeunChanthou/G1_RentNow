<template>
  <div class="search-bar shadow p-5 mb-5 bg-white rounded" style="height: 82%;">
    <div class="search" style="padding-left: 30px">
      <el-input v-model="product" style="width: 100%" size="large" placeholder="Please Input" />
    </div>
    <div class="select" style="padding-left: 30px; margin-top: 30px">
      <div class="select-cate" style="display: flex; align-items: end">
        <Icon
          icon="mdi:filter-outline"
          width="40px"
          height="40px"
          style="color: #e60fa2"
          :inline="true"
        />
        <h3 style="color: #e60fa2">Filter</h3>
      </div>

      <div class="select-group" style="margin-top: 20px">
        <el-select
          v-model="cate"
          placeholder="Select catagories"
          style="width: 100%; margin-bottom: 10px"
          size="large"
        >
          <el-option-group v-for="product in products.product.categories" :key="product.id">
            <el-option :key="product.id" :label="product.name" :value="product.name" />
          </el-option-group>
        </el-select>
      </div>
      <div class="select-group" style="margin-top: 20px">
        <el-select
          v-model="shopValue"
          placeholder="select my shop"
          style="width: 100%; margin-bottom: 10px"
          size="large"
        >
          <el-option-group v-for="subShop in shop.shops" :key="subShop.id">
            <el-option :key="subShop.id" :label="subShop.name" :value="subShop.name" />
          </el-option-group>
        </el-select>
      </div>
      <div class="select-group" style="margin-top: 20px">
          <el-input v-model="day" style="width: 100%" size="large" placeholder="Day required" />
      </div>
    </div>
  </div>


</template>


<script>
import { useProductStore } from '@/stores/category-list.ts'
import { useShopStore } from '@/stores/shop-list.ts'
// import { productStore } from '@/stores/product-list.ts'

export default {
  data() {
    return {
      products: useProductStore(),
      shop: useShopStore(),
      // proList: productStore(),
      product: '',
      shopValue: '',
      value: '',
      cate: '',
      day: ''
    }
  },
  mounted() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      this.fetchProduct()
      this.fetchShop()
      // this.fetchProductStore()
    },
    fetchProduct() {
      this.products.fetchProduct()
    },
    fetchShop() {
      this.shop.fetchShop()
    },
    // fetchProductStore() {
    //   this.proList.fetchProductStore()
    // }
  }
}
</script>


<style>
</style>