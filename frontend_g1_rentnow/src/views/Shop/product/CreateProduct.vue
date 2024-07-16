<template>
  <el-container class="layout-container-demo" style="height: 100vh">
    <AdminLayout />
    <el-container>
      <el-header
        style="
          text-align: right;
          font-size: 12px;
          background: linear-gradient(90deg, #722cb3 30%, #c49be9);
          height: 80px;
        "
      >
        <div class="toolbar">
          <el-dropdown>
            <el-icon style="margin-right: 8px; margin-top: 1px; font-size: 30px">
              <setting />
            </el-icon>
            <template #dropdown>
              <el-dropdown-menu>
                <el-dropdown-item>View</el-dropdown-item>
                <el-dropdown-item>Add</el-dropdown-item>
                <el-dropdown-item>Delete</el-dropdown-item>
              </el-dropdown-menu>
            </template>
          </el-dropdown>
          <span>Tom</span>
        </div>
      </el-header>

      <el-main class="px-5 py-5" style="background-color: rgb(207, 207, 207)">
        
        <!-- <el-form title="Success alert" type="success" center show-icon v-if="showSuccessAlert">
          <p slot="descrip">You Create Success.</p>
        </el-form> -->
        <el-alert
          v-if="showSuccessAlert"
          title="Success"
          type="success"
          description="You have successfully created a product."
          show-icon
          center
          @close="showSuccessAlert = false"
        />
        <el-form
          @submit.prevent="submitForm"
          style="max-width: 100%; background: white; padding: 20px"
        >
          <el-form-item prop="name">
            <el-label>Name of ruleForm</el-label>
            <el-input v-model="ruleForm.name" />
          </el-form-item>
          <el-form-item prop="price">
            <el-label>Price</el-label>
            <el-input type="number" v-model="ruleForm.price" />
          </el-form-item>
          <el-form-item prop="region">
            <el-label>Select category</el-label>
            <el-select v-model="ruleForm.category_id" placeholder="categories">
              <el-option v-for="cate in cateData.product.categories" :key="cate.id" :label="cate.name" :value="cate.id" />
              <!-- <el-option label="Zone two" value="1" /> -->
            </el-select>
          </el-form-item>
          <el-form-item required>
            <el-col :span="11">
              <el-label>Image</el-label>
              <el-form-item prop="date1" style="width: 100%">
                <input type="file" @change="previewImage" accept="image/*" style="
                    width: 100%;
                    height: 78%;
                    padding-left: 11px;
                    border: 1px solid rgb(228, 228, 228);
                    border-radius: 4px;
                  " />
              </el-form-item>
            </el-col>
            <el-col class="text-center" :span="2">
            </el-col>
            <el-col :span="11">
              <el-label>user</el-label>
              <el-select v-model="ruleForm.user_id" placeholder="Select User">
                <el-option v-for="member in memberData" :key="member.id" :label="member.member.first_name + member.member.last_name" value="1" />
              </el-select>
            </el-col>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" native-type="submit"> Create </el-button>
            <el-button @click="resetForm">Reset</el-button>
          </el-form-item>
        </el-form>
      </el-main>
    </el-container>
  </el-container>
</template>

<script lang="ts" setup>
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import { reactive, ref } from 'vue'
import { CreateProductStore } from '@/stores/product-list'
import type { ComponentSize, FormInstance, FormRules } from 'element-plus'
import { useAuthStore } from '@/stores/auth-store.ts'
import { getShopStore } from '@/stores/shop-list.ts'
import { useProductStore } from '@/stores/category-list.ts'
import axiosInstance from '@/plugins/axios'


const AuthUser = useAuthStore()
const Shop = getShopStore()
const shopId = Shop.fetchShopSpecific(AuthUser.user.id)
const cateData = useProductStore()

const cate = cateData.fetchProduct()
interface RuleForm {
  name: string
  category_id: string
  price: number
  image: string
  user_id: string
}


const formSize = ref<ComponentSize>('large')
const ruleForm = reactive<RuleForm>({
  name: '',
  category_id: '',
  price: 0,
  image: '',
  user_id: '',
})
const memberData = ref()
const createPro = CreateProductStore()
const showSuccessAlert = ref(false)

const previewImage = (event: Event) => {
  const file = (event.target as HTMLInputElement).files?.[0]
  if (file) {
    convertImageToBase64(file)
  }
}

const convertImageToBase64 = (file: File) => {
  const reader = new FileReader()
  reader.onloadend = () => {
    ruleForm.image = reader.result as string
  }
  reader.readAsDataURL(file)
}

const submitForm = () => {
  createPro.createProductShop(ruleForm)
  showSuccessAlert.value = true
  resetForm()
}

const resetForm = () => {
  ruleForm.name = ''
  ruleForm.category_id = ''
  ruleForm.price = 0
  ruleForm.image = ''
  ruleForm.user_id = ''
}


async function fetchData() {
  try {
    const response = await axiosInstance.get('/members')
    memberData.value = response.data.data.member
  } catch (error) {
    console.error(error)
  }
}

fetchData()

</script>
