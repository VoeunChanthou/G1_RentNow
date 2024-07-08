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
        <el-form
          ref="ruleFormRef"
          style="max-width: 100%; background: white; padding: 20px"
          :model="ruleForm"
          label-width="auto"
          class="demo-ruleForm"
          :size="formSize"
          status-icon
          @submit="submitForm"
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
            <el-select v-model="ruleForm.category_id" placeholder="Activity zone">
              <el-option label="Zone one" value="1" />
              <el-option label="Zone two" value="2" />
            </el-select>
          </el-form-item>
          <el-form-item required>
            <el-col :span="11">
              <el-label>Image</el-label>
              <el-form-item prop="image" style="width: 100%">
                <el-upload
                  ref="uploadRef"
                  style="
                    width: 100%;
                    height: 78%;
                    padding-left: 11px;
                    border: 1px solid rgb(228, 228, 228);
                    border-radius: 4px;
                  "
                  :before-upload="beforeUpload"
                  :on-change="handleChange"
                  :auto-upload="false"
                >
                  <el-button slot="trigger">Select file</el-button>
                </el-upload>
              </el-form-item>
            </el-col>
            <el-col class="text-center" :span="2">
              <span class="text-gray-500">-</span>
            </el-col>
            <el-col :span="11">
              <el-label>User</el-label>
              <el-select v-model="ruleForm.shop_id" placeholder="Activity zone">
                <el-option label="Baby" value="1" />
                <el-option label="Party" value="2" />
              </el-select>
            </el-col>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="submitForm(ruleFormRef)"> Create </el-button>
          </el-form-item>
        </el-form>
      </el-main>
    </el-container>
  </el-container>
</template>

<script lang="ts" setup>
import { Setting } from '@element-plus/icons-vue'
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import { reactive, ref } from 'vue'
import type { ComponentSize, FormInstance } from 'element-plus'
import axiosInstance from '@/plugins/axios'
import type { UploadRawFile } from 'element-plus'

interface RuleForm {
  name: string
  category_id: number
  price: number
  image: UploadRawFile | null
  days: number
  shop_id: number
}

const formSize = ref<ComponentSize>('large')
const ruleFormRef = ref<FormInstance>()
const ruleForm = reactive<RuleForm>({
  name: '',
  category_id: 0,
  days: 4,
  image: null,
  price: 0,
  shop_id: 1
})

const beforeUpload = (file: UploadRawFile) => {
  const isLt2M = file.size / 1024 / 1024 < 2
  if (!isLt2M) {
    console.error('File size exceeds 2MB')
  }
  return isLt2M
}

const handleChange = (file: UploadRawFile) => {
  // Rename the file
  const renamedFile = new File([file], `${file.name}`)
  ruleForm.image = renamedFile
}

const submitForm = async (formEl: FormInstance | undefined) => {
  if (!formEl) return
  await formEl.validate(async (valid, fields) => {
    if (valid) {
      try {
        const response = await axiosInstance.post(`http://127.0.0.1:8000/api/create/product`, {
          name: ruleForm.name,
          category: ruleForm.category_id,
          price: ruleForm.price,
          image: ruleForm.image,
          days: ruleForm.days,
          shop_id: ruleForm.shop_id
        })
        console.log('Form submitted successfully:', response.data)
      } catch (error) {
        console.error('Form submission error:', error)
      }
    } else {
      console.log('Error submitting form:', fields)
    }
  })
  console.log(ruleForm)
}
</script>

<style scoped>
.layout-container-demo .el-header {
  position: relative;
  background-color: var(--el-color-primary-light-7);
  color: var(--el-text-color-primary);
}
.layout-container-demo .el-aside {
  color: var(--el-text-color-primary);
  background: var(--el-color-primary-light-8);
}
.layout-container-demo .el-menu {
  border-right: none;
}
.layout-container-demo .el-main {
  padding: 0;
}
.layout-container-demo .toolbar {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  right: 20px;
}
</style>
