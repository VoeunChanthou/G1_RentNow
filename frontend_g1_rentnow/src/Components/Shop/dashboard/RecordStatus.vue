<template>
    <table class="table align-middle mb-0 bg-white mt-4">
  <thead class="bg-light">
    <tr>
      <th>#</th>
      <th>Image</th>
      <th>Name</th>
      <th>Status</th>
      <th>Price</th>
      <th>Borrow Date</th>
      <th>Return Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- {{ borrows }} -->
    <tr v-for="borrow in borrows" :key="borrow.id">
        <td>{{ borrow.id }}</td>
      <td>
        <div class="d-flex align-items-center">
          <img
              :src="borrow.product.image"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">{{ borrow.product.name }}</p>
      </td>
      <td>
        <span class=" badge-success rounded-pill d-inline" style="background: rgb(140, 255, 73); padding-left: 7px; padding-right: 7px;">{{ borrow.product.status }}</span>
      </td>
      <td>${{ borrow.price }}.00</td>
      <td>
        {{ borrow.start_date }}
      </td>
      <td>
        {{ borrow.return_date }}
      </td>
      <td>
        <el-button
          type="primary"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasView"
          :icon="View"
          circle
        />
      </td>
    </tr>
  </tbody>
</table>
</template>


<script lang="ts" setup>
import { Edit, Delete, View } from '@element-plus/icons-vue'
import axiosInstance from '@/plugins/axios'
import { computed, ref } from 'vue'


const props = defineProps({
  borrows: {
    type: Object,
    required: true
  }
})


</script>

<style>

</style>