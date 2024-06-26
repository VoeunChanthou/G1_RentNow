
<script setup lang="ts">
// import $ from 'jquery'
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import CategoryVue from '@/Components/service/CategoryVue.vue'
import CardVue from '@/Components/homepage/CardVue.vue'
import { ref } from 'vue'
import { Search } from '@element-plus/icons-vue'
import type { componentSizeMap } from 'element-plus'
import { useAuthStore } from '@/stores/auth-store.ts'
import { productStore } from '@/stores/product-list.ts'

const AuthUSer = useAuthStore()
const proList = productStore()

const products = proList.fetchProductStore()
</script>

<template>
  <WebLayout>
    <div
      class="px-5"
      style="
        height: 100vh;
        display: grid;
        grid-template-columns: 25% 74%;
        gap: 20px;
        padding-top: 10px;
        padding-bottom: 20px;
        background: #f4f2f2;
      "
    >
      <CategoryVue></CategoryVue>

      <div style="height: 100%; display: grid; grid-template-rows: 100px 100vh; gap: 20px">
        <div class="top shadow p-3 px-5 rounded bg-white" style="display:flex; justify-content: space-between; align-items: center; position: sticky; top: 0;  z-index: 99;">
          <h3>Result</h3>
          <div class="select-group">
            <el-select v-model="value" placeholder="Select" style="width: 200px;" size="large">
              <el-option-group  v-for="group in options" :key="group.label" :label="group.label">
                <el-option
                  v-for="item in group.options"
                  :key="item.value"
                  :label="item.label"
                  :value="item.value"
                />
              </el-option-group>
            </el-select>
          </div>
        </div>
        <div class="top shadow p-3 rounded form_Card" style="height: 80%; background: #f4f2f2;display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 20px; overflow-y: scroll;">
          <CardVue v-for="product in proList.productList" :key="product.id" :product="product"></CardVue>
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<style>
.form_Card,
.selecter {
  border-radius: 20px;
  padding: 10px;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}
.form_Card {
  flex-wrap: wrap;
  /* width: 100%; */
}
</style>