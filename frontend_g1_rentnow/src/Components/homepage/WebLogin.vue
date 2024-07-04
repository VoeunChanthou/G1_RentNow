
<template>
  <div
    class="modal fade"
    id="exampleModal"
    aria-labelledby="exampleModalLabel"
    aria-hidden="false"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="px-5 py-5" style="width: 100%">
          <div class="row">
            <div class="col-12">
              <div class="mb-5 row">
                <h5 class="col-11 modal-title" id="exampleModalLabel">Login</h5>
                <button
                  type="button"
                  class="col-1 btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
            </div>
          </div>
          <el-form @submit="onSubmit">
            <div class="row gy-3 overflow-hidden">
              <div class="col-12">
                <el-form-item :error="emailError">
                  <el-input placeholder="Email Address" v-model="email" size="large" />
                </el-form-item>
              </div>
              <div class="col-12">
                <el-form-item :error="nameError"  class="mt-8">
                  <el-input
                    placeholder="Password"
                    v-model="password"
                    size="large"
                    type="password"
                  />
                  
                </el-form-item>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    name="remember_me"
                    id="remember_me"
                  />
                  <label class="form-check-label text-secondary" for="remember_me">
                    Keep me logged in
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn bsb-btn-2xl btn-primary" :disabled="isSubmitting">
                    Log in now
                  </button>
                </div>
              </div>
            </div>
          </el-form>
          <div class="row">
            <div class="col-12">
              <hr class="mt-5 mb-4 border-secondary-subtle" />
              <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                <a href="#!" class="link-secondary text-decoration-none">Create new account</a>
                <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p class="mt-5 mb-4">Or continue with</p>
              <div class="d-flex gap-3 flex-column">
                <a href="#!" class="btn bsb-btn-xl btn-danger">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-google"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"
                    />
                  </svg>
                  <span class="ms-2 fs-6 text-uppercase">Sign in With Google</span>
                </a>
                <a href="#!" class="btn bsb-btn-xl btn-primary">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-facebook"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                    />
                  </svg>
                  <span class="ms-2 fs-6 text-uppercase">Sign in With Facebook</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'

const router = useRouter()

const formSchema = yup.object({
  password: yup.string().required().label('Password'),
  email: yup.string().required().email().label('Email address')
})

const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
    password: '',
    email: ''
  },
  validationSchema: formSchema
})

const onSubmit = handleSubmit(async (values) => {
  try {
    const { data } = await axiosInstance.post('/login', values)
    localStorage.setItem('access_token', data.access_token)
    router.push('/')
  } catch (error) {
    alert('You password is wrong !')
  }
})

const { value: password, errorMessage: nameError } = useField('password')
const { value: email, errorMessage: emailError } = useField('email')
</script>

<style scoped>
.min-h-screen {
  min-height: 100vh;
}
</style>
