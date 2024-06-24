<template>
    <div class="modal fade" id="popupRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="main"></div> 
    <div  class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Register Your Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
      </div>
      
    </div>
  </div>
</div>
</template>
<script setup lang="ts">
import { inject } from 'vue';
import axiosInstance from '@/plugins/axios'
import { useField, useForm, validate } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'
import { Loading } from '@element-plus/icons-vue';
import { main } from '@popperjs/core';

const router = useRouter()
const formSchema = yup.object({
  password: yup.string().required().label('Password'),
  email: yup.string().required().email().label('Email address'),
  last_name: yup.string().required().label('last name'),
  first_name: yup.string().required().label('First name'),
  phone_number: yup.string()
    .required('Phone number is required')
    .matches(/^[0-9]{7,10}$/, 'Phone number must be between 7 and 10 digits')
    .label('Phone Number'),
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
    let loader = document.createElement ("div");
    let main = document.querySelector (".main");
    loader.classList.add("loader");
    main?.append(loader);
  try {
    const { data } = await axiosInstance.post('/register', values)
    localStorage.setItem('access_token', data.access_token)
    loader.style.display = "none";
    location.reload()
  } catch (error) {
    alert (error + " Please! Ckeck Your Email Or Phone Number")      
    loader.style.display = "none";
    console.warn('Error')
  }
})

const { value: last_name, errorMessage: errorlastname } = useField('last_name')
const { value: first_name, errorMessage: errorfirstname } = useField('first_name')
const { value: phone_number, errorMessage: errorphone } = useField ('phone_number')
const { value: password, errorMessage: nameError } = useField('password')
const { value: email, errorMessage: emailError } = useField('email')

</script>
<style>
.loader {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  display: block;
  margin:15px auto;
  position: relative;
  color: #FFF;
  left: -100px;
  box-sizing: border-box;
  animation: shadowRolling 2s linear infinite;
}

@keyframes shadowRolling {
  0% {
    box-shadow: 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
  }
  12% {
    box-shadow: 100px 0 white, 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
  }
  25% {
    box-shadow: 110px 0 white, 100px 0 white, 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
  }
  36% {
    box-shadow: 120px 0 white, 110px 0 white, 100px 0 white, 0px 0 rgba(255, 255, 255, 0);
  }
  50% {
    box-shadow: 130px 0 white, 120px 0 white, 110px 0 white, 100px 0 white;
  }
  62% {
    box-shadow: 200px 0 rgba(255, 255, 255, 0), 130px 0 white, 120px 0 white, 110px 0 white;
  }
  75% {
    box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 130px 0 white, 120px 0 white;
  }
  87% {
    box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 130px 0 white;
  }
  100% {
    box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0);
  }
}
</style>


