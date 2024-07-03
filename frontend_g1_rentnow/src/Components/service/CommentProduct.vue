<template>      
<div class="modal fade" id="formfeedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="border:2px solid yellow;">
      <div class="modal-header" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);  ">
        <h5 class="modal-title text-white" id="exampleModalLabel" >Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <el-form @submit="createFeedback">
            <el-form-item :error="errorComment" class="mt-8">
              <el-input placeholder="Phone Number" type="number" class="form-control"  v-model="comment" size="large"  />
              <el-input placeholder="Phone Number" type="number" class="form-control"  v-model="product_id" size="large"  />
            </el-form-item>
        </el-form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send Comment</button>
      </div>
    </div>
  </div>
</div>
</template>
<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm, validate } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'
import { Loading } from '@element-plus/icons-vue';
import { main } from '@popperjs/core';
const router = useRouter()
const formSchema = yup.object({
  comment: yup.string().required().label('Comment'),
})
const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
      product_id: null,
      comment : '', 
  },
  
  validationSchema: formSchema
})
const createFeedback = handleSubmit(async (values) => {
    let loader = document.createElement ("div");
    let main = document.querySelector (".main");
    loader.classList.add("loader");
    main?.append(loader);
  try {
     await axiosInstance.post('/comment', values)
  } catch (error) {
    console.warn('Error')
  }
})

const { value: comment, errorMessage: errorComment } = useField('comment')
const { value:  product_id, errorMessage: errorproduct } = useField('product_id')


</script>
