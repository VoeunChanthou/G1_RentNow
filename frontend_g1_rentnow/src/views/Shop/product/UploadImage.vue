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
        <el-upload
          action="#"
          list-type="picture-card"
          :auto-upload="false"
        >
          <el-icon><Plus /></el-icon>
        </el-upload>

        <div class="image-grid">
          <div v-for="(image, index) in getImg" :key="index" class="image-item">
            <img :src="image.image" alt="Uploaded Image" />
            <div class="image-actions">
              <span
                class="el-upload-list__item-preview"
                @click="handlePictureCardPreview(image)"
              >
                <el-icon><zoom-in /></el-icon>
              </span>
              <span
                v-if="!disabled"
                class="el-upload-list__item-delete"
                @click="handleDownload(image)"
              >
                <el-icon><Download /></el-icon>
              </span>
              <span
                v-if="!disabled"
                class="el-upload-list__item-delete"
                @click="handleRemove(image)"
              >
                <el-icon><Delete /></el-icon>
              </span>
            </div>
          </div>
        </div>

        <el-dialog v-model="dialogVisible">
          <img w-full :src="dialogImageUrl" alt="Preview Image" />
        </el-dialog>
      </el-main>
    </el-container>
  </el-container>
</template>

<script lang="ts" setup>
import AdminLayout from '@/Components/Layouts/AdminLayout.vue'
import { Edit, Plus, View, Setting } from '@element-plus/icons-vue'
import axiosInstance from '@/plugins/axios'
import { computed, ref } from 'vue'
import { Delete, Download, ZoomIn } from '@element-plus/icons-vue'
import { useRoute } from 'vue-router'

import type { UploadFile, UploadRawFile } from 'element-plus'

const dialogImageUrl = ref('')
const dialogVisible = ref(false)
const disabled = ref(false)
const imageBase64 = ref()
const imageBase = ref('')
const route = useRoute()
const getImg = ref([])

const handleRemove = (file: any) => {
  console.log(file)
}

const handlePictureCardPreview = (file: any) => {
  dialogImageUrl.value = `data:image/jpeg;base64,${file.image}`
  dialogVisible.value = true
}

const handleDownload = (file: any) => {
  console.log(file)
}

const handleUploadChange = (uploadFile: UploadRawFile) => {
  const reader = new FileReader()
  reader.onload = () => {
    imageBase64.value = reader.result as string
    imageBase.value = imageBase64.value.replace('data:image/jpeg;base64,', '')
    getProduct()
  }
  reader.readAsDataURL(uploadFile.raw!)
}

const getProduct = async () => {
  const response = await axiosInstance.post(`/create/product/detail/${route.params.id}`, {
    image: imageBase.value,
  })
  console.log(response)
}

const getAllImg = async () => {
  const response = await axiosInstance.get(`image/detail/${route.params.id}`)
  getImg.value = response.data.detail
}

getAllImg()
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

.image-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-gap: 20px;
}

.image-item {
  position: relative;
  overflow: hidden;
  border-radius: 4px;
}

.image-item img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.image-actions {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  transition: opacity 0.3s;
}

.image-item:hover .image-actions {
  opacity: 1;
}

.image-actions span {
  color: white;
  margin: 0 10px;
  cursor: pointer;
}
</style>