
<script setup lang="ts">
// import $ from 'jquery'
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import CategoryVue from '@/Components/service/CategoryVue.vue'
import { ref } from 'vue'
import { Search } from '@element-plus/icons-vue'
import type { componentSizeMap } from 'element-plus'
import { useAuthStore } from '@/stores/auth-store.ts'



const AuthUSer = useAuthStore()




</script>

<template>
  <WebLayout>
    <div
      class="px-5"
      style="
        height: 150vh;
        display: grid;
        grid-template-columns: 30% 69%;
        gap: 20px;
        padding-top: 10px;
        padding-bottom: 20px;
        background: #f4f2f2;
      "
    >
  <CategoryVue></CategoryVue>
      
      <div style="height: 100%; display: grid; grid-template-rows: 12% 86%; gap: 20px">
        <div class="top shadow p-3 px-5 rounded bg-white" style="display:flex; justify-content: space-between; align-items: center;">
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
        <div class="top shadow p-3 rounded" style="background: #f4f2f2"></div>
      </div>
    </div>
  </WebLayout>
</template>

<style>
</style>

