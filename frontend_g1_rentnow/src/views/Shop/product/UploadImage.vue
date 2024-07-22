
<template>
  <el-container class="layout-container-demo" style="height: 100vh">
    <AdminLayout />
    <el-container>
        <div style=" margin: -45px 0 20px -45px;">
          
          <NavbarShopOwner ></NavbarShopOwner>
        </div>

      <el-main class="px-5 py-5" style="background-color: rgb(207, 207, 207)">
        <el-upload
          action="#"
          list-type="picture-card"
          :auto-upload="false"
          :on-change="handleUploadChange"
        >
          <el-icon><Plus /></el-icon>
        </el-upload>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 20px; margin-top: 20px;">
          <div v-for="(image, index) in getImg" :key="index" class="image-item" style="width: 100%; height: 100%;">
            <img :src="image.image" alt="Uploaded Image" />
            <div class="image-actions">
              <span
                class="el-upload-list__item-preview"
                @click="handlePictureCardPreview(image.image)"
              >
                <el-icon><zoom-in /></el-icon>
              </span>
              <span
                class="el-upload-list__item-preview"
                @click="handleRemove(image.id)"
              >
                <el-icon><Delete /></el-icon>
              </span>
              <span
                class="el-upload-list__item-preview"
                @click="handlePictureCardPreview(image.image)"
              >
                <el-icon><Download /></el-icon>
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
import NavbarShopOwner from '@/Components/NavbarShopOwner.vue'
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

const handleRemove = async (id: any) => {
  const response = await axiosInstance.delete(`/delete/product/detail/${id}`);
  console.log(response);
  location.reload()
  
}

const handlePictureCardPreview = (file: any) => {
  dialogImageUrl.value = file
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
  location.reload()
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