<!-- src/components/Login.vue -->
<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
      <el-card class="w-full max-w-md shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Register Your Account</h2>
        <el-form @submit="onSubmit">
          <div class="row mb-2">
            <div class="col">
            <el-form-item  :error="errorfirstname"  class="mt-8">
              <el-input placeholder="First Name" type="text"  v-model="first_name" size="large"  />
            </el-form-item>
            </div>
            <div class="col">
            <el-form-item :error="errorlastname"  class="mt-8">
              <el-input placeholder="Last Name" type="text"  v-model="last_name" size="large"  />
            </el-form-item>
            </div>
          </div>
          <el-form-item :error="emailError">
            <el-input placeholder="Email Address" v-model="email" size="large" type="email" />
          </el-form-item>
          <el-form-item :error="errorphone" class="mt-8">
              <el-input placeholder="Phone Number" type="number"  v-model="phone_number" size="large"  />
            </el-form-item>
            <el-form-item :error="nameError" class="mt-8">
              <el-input placeholder="Password" v-model="password" size="large" type="password" />
            </el-form-item>
          <div>
            <el-button
              size="large"
              class="mt-3 w-full"
              :disabled="isSubmitting"
              type="primary"
              native-type="submit"
              >Submit</el-button
            >
          </div>
        </el-form>
      </el-card>
    </div>

  </template>
  
  <script setup lang="ts">
  import { inject } from 'vue';
  import axiosInstance from '@/plugins/axios'
  import { useField, useForm } from 'vee-validate'
  import * as yup from 'yup'
  import { useRouter } from 'vue-router'
  
  const router = useRouter()
  const formSchema = yup.object({
    password: yup.string().required().label('Password'),
    email: yup.string().required().email().label('Email address'),
    last_name: yup.string().required().label('last name'),
    first_name: yup.string().required().label('First name'),
    phone_number: yup.string().required().label('Phone Number'),
  })
  
  const { handleSubmit, isSubmitting } = useForm({
    initialValues: {
        first_name : '',
        last_name : "",
        email: '',
        phone_number: "",
        password: '', 
    },
    validationSchema: formSchema
  })
  
  const onSubmit = handleSubmit(async (values) => {
    try {
      const { data } = await axiosInstance.post('/register', values)
      localStorage.setItem('access_token', data.access_token)
      router.push('/')
    } catch (error) {
      console.warn('Error')
    }
  })
  
  const { value: last_name, errorMessage: errorlastname } = useField('last_name')
  const { value: first_name, errorMessage: errorfirstname } = useField('first_name')
  const { value: phone_number, errorMessage: errorphone } = useField('phone_number')
  const { value: password, errorMessage: nameError } = useField('password')
  const { value: email, errorMessage: emailError } = useField('email')

  </script>
  
  <style scoped>
  .min-h-screen {
    min-height: 100vh;
  }
  /* HTML: <div class="loader"></div> */
.loader {
  width: 50px;
  aspect-ratio: 1;
  display: grid;
  animation: l14 4s infinite;
}
.loader::before,
.loader::after {    
  content: "";
  grid-area: 1/1;
  border: 8px solid;
  border-radius: 50%;
  border-color: red red #0000 #0000;
  mix-blend-mode: darken;
  animation: l14 1s infinite linear;
}
.loader::after {
  border-color: #0000 #0000 blue blue;
  animation-direction: reverse;
}
@keyframes l14{ 
  100%{transform: rotate(1turn)}
}
  </style>
  