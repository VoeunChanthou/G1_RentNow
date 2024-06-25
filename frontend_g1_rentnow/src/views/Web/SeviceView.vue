
<script setup lang="ts">
// import $ from 'jquery'
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { ref } from 'vue'
import { Search } from '@element-plus/icons-vue'
import type { componentSizeMap } from 'element-plus'
import { useAuthStore } from '@/stores/auth-store.ts'
const AuthUSer = useAuthStore()

const product = ref('')
const value = ref('')
const options = [
  {
    label: 'Popular cities',
    options: [
      {
        value: 'Shanghai',
        label: 'Shanghai',
      },
      {
        value: 'Beijing',
        label: 'Beijing',
      },
    ],
  },
  {
    label: 'City name',
    options: [
      {
        value: 'Chengdu',
        label: 'Chengdu',
      },
      {
        value: 'Shenzhen',
        label: 'Shenzhen',
      },
      {
        value: 'Guangzhou',
        label: 'Guangzhou',
      },
      {
        value: 'Dalian',
        label: 'Dalian',
      },
    ],
  },
]

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
      <div class="search-bar shadow p-5 mb-5 bg-white rounded" style="height: 100%">
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

          <div class="select-group" style="margin-top: 20px;">
            <el-select v-model="value" placeholder="Select catagories" style="width: 100%; margin-bottom: 10px;" size="large">
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
          <div class="select-group" style="margin-top: 20px;">
            <el-select v-model="value" placeholder="select my shop" style="width: 100%; margin-bottom: 10px;" size="large">
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
          <div class="select-group" style="margin-top: 20px;">
            <el-select v-model="value" placeholder="Day required" style="width: 100%; margin-bottom: 10px;" size="large">
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
      </div>
      <div style="height: 100%; display: grid; grid-template-rows: 12% 86%; gap: 20px">
        <div class="top shadow p-3 rounded bg-white"></div>
        <div class="top shadow p-3 rounded" style="background: #f4f2f2"></div>
      </div>
    </div>
  </WebLayout>
</template>

<style>
</style>

