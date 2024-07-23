<template>
  <el-table :data="filterTableData" style="width: 100%; margin-top: 20px">
    <el-table-column label="Product Image">
      <template #default="scope">
        <img :src="scope.row.image" alt="Product Image" style="max-width: 50px; max-height: 50px" />
      </template>
    </el-table-column>
    <el-table-column label="Name" prop="name" />
    <!-- <el-table-column label="Price" prop="price" /> -->
    <el-table-column label="Price">
  <template #default="scope">
    ${{ scope.row.price.toFixed(2) }}
  </template>
</el-table-column>
    <el-table-column label="Category" prop="category.name" />
    <el-table-column label="Status" prop="status"/>
    <el-table-column align="right">
      <template #header>
        <el-input v-model="search" size="small" placeholder="Type to search" />
      </template>
      <template #default="scope">
        <el-button
          type="primary"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasEdit"
          @click="update(scope.row, scope.row.id)"
          :icon="Edit"
          circle
        />
        <el-button
          type="primary"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasView"
          @click="view(scope.row)"
          :icon="View"
          circle
        />
        <el-button type="danger" @click="deletePro(scope.row.id)" :icon="Delete" circle />
      </template>
    </el-table-column>
  </el-table>

  <div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasEdit"
    aria-labelledby="offcanvasEditLabel"
  >
    <el-main class="px-5 py-5" style="background-color: rgb(207, 207, 207)">
      <el-alert
        title="Success"
        type="success"
        description="You have successfully updated a product."
        show-icon
        center
        v-if="showSuccessAlert"
      />
      <el-form>
        <el-form-item>
          <el-label>Name</el-label>
          <el-input type="text" v-model="name" />
        </el-form-item>
        <el-form-item prop="price">
          <el-label>Price</el-label>
          <el-input type="number" v-model="price" />
        </el-form-item>
        <el-form-item prop="category_id">
          <el-label>Select category</el-label>
          <el-select v-model="category_id" placeholder="categories">
            <el-option
              v-for="cate in cateData"
              :key="cate.id"
              :label="cate.name"
              :value="cate.id"
            />
          </el-select>
        </el-form-item>
        <el-form-item required>
          <el-col :span="11">
            <el-label>Image</el-label>
            <el-form-item prop="image" style="width: 100%">
              <input
                type="file"
                accept="image/*"
                @change="handleImageUpload"
                style="
                  width: 100%;
                  height: 78%;
                  padding-left: 11px;
                  border: 1px solid rgb(228, 228, 228);
                  border-radius: 4px;
                "
              />
            </el-form-item>
          </el-col>
          <el-col class="text-center" :span="2"> </el-col>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="updatePro"> Update </el-button>
        </el-form-item>
      </el-form>
    </el-main>
  </div>

  <div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasView"
    aria-labelledby="offcanvasViewLabel"
    style="background: white;"
  >
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasViewLabel">Product View</h5>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="offcanvas"
        aria-label="Close"
      ></button>
    </div>
    <div class="offcanvas-body">
      <div class="demo-image__preview" style="text-align: center; margin-bottom: 30px">
        <el-image :src="proImg" style="width: 150px; height: 140px; border-radius: 5px" />
      </div>
      <div style="border-radius: 15px">
        <div class="card-body pb-0">
          <div class="d-flex justify-content-between">
            <div>
              <p><a href="#!" class="text-dark">Name</a></p>
              <p class="small text-muted">{{ name }}</p>
            </div>
            <div>
              <div class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="small text-muted">Rated 4.0/5</p>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body pb-0">
          <div class="d-flex justify-content-between">
            <div>
              <p><a href="#!" class="text-dark">Shop ID</a></p>
              <p class="small text-muted">{{ shop_id }}</p>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body pb-0">
          <div class="d-flex justify-content-between">
            <div>
              <p><a href="#!" class="text-dark">Category</a></p>
              <p class="small text-muted">{{ category_id }}</p>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body pb-0">
          <div class="d-flex justify-content-between">
            <div>
              <p><a href="#!" class="text-dark">Price</a></p>
              <p class="small text-muted">${{ price }}.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { Edit, Delete, View } from '@element-plus/icons-vue'
import axiosInstance from '@/plugins/axios'
import { computed, ref } from 'vue'

interface Product {
  id: number
  name: string
  price: number
  category: { name: string }
  image: string
  shop: { id: string }
}

const productData = ref<Product[]>([])
const cateData = ref<{ id: number; name: string }[]>([])

const name = ref('')
const shop_id = ref('')
const price = ref(0)
const category_id = ref<number | null>(null)
const id = ref<File | null>(null)
const showSuccessAlert = ref(false)

const fetchData = async () => {
  try {
    const response = await axiosInstance.get('/product/shop')
    productData.value = response.data.products
    cateData.value = response.data.categories
  } catch (error) {
    console.error(error)
  }
}

fetchData()

const update = (row: Product) => {
  name.value = row.name
  price.value = row.price
  category_id.value = row.category.name
  id.value = row.id
}

const view = (row: Product) => {
  name.value = row.name
  price.value = row.price
  category_id.value = row.category.name
  proImg.value = row.image
  shop_id.value = row.shop.id
}

const proImg = ref('')
const search = ref('')
const filterTableData = computed(() =>
  productData.value.filter((product) =>
    product.name.toLowerCase().includes(search.value.toLowerCase())
  )
)

const handleImageUpload = (event: Event) => {
  const file = (event.target as HTMLInputElement).files?.[0]
  if (file) {
    convertImageToBase64(file)
  }
}

const convertImageToBase64 = (file: File) => {
  const reader = new FileReader()
  reader.onloadend = () => {
    proImg.value = reader.result as string
  }
  reader.readAsDataURL(file)
}

async function deletePro(id: string) {
  const confirm = window.confirm('Are you sure you want to delete this item?')
  if (confirm) {
    try {
      const response = await axiosInstance.delete(`http://127.0.0.1:8000/api/delete/product/${id}`)
      fetchData()
    } catch (error) {
      console.error(error)
    }
  }
}

async function updatePro() {
  const confirm = window.confirm('Are you sure you want to update this item?')
  if (confirm) {
    try {
      const response = await axiosInstance.put(`/update/product/${id.value}`, {
        name: name.value,
        price: price.value,
        category_id: category_id.value,
        image: proImg.value
      })
      fetchData()
      showSuccessAlert.value = true
    } catch (error) {
      console.error(error)
    }
  }
}
</script>

<style scoped>
</style>
