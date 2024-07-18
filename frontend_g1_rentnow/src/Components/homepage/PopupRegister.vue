<template>
    <div class="modal fade" id="popupRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="main d-flex justify-content-center "></div> 
    <div  class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Register Your Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-row">
    <div class=" d-flex justify-content-around ">
      <div class="col-md-5.5 mb-1">
      <label for="validationServer01">First name</label>
      <input type="text" :class="'form-control is-' + firstnameClass.style" id="validationServer01" placeholder="First name" v-model="form.first_name" required>
      <div class="invalid-feedback">
        First name is required.
      </div>
    </div>
    <div class="col-md-5.5 mb-1">
      <label for="validationServer02">Last name</label>
      <input type="text" :class="'form-control is-'+ lastnameClass.style" id="validationServer02" placeholder="Last name" v-model="form.last_name" required>
      <div class="invalid-feedback">
        Last name is required.
      </div>
    </div>
    </div>

    <div class="col-md-11.6 mb-2 m-1.8">
      <label for="validationServerUsername">Email Address: </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3">@</span>
        </div>
        <input type="email" :class="'form-control is-' + emailClass.style" id="validationServerUsername" placeholder="Your Email Address" aria-describedby="inputGroupPrepend3" v-model="form.email" required>
        <div class="invalid-feedback">
          Invalid email address.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-11.6 mb-2 m-1.8">
      <label for="validationServer03">Phone Number: </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3"><img src="https://e7.pngegg.com/pngimages/468/969/png-clipart-phone-call-logo-sketch-telephone-mobile-phones-computer-icons-logo-telephone-miscellaneous-text-thumbnail.png" alt="" height="23px"></span>
        </div>
      <input type="text" :class="'form-control is-' + phoneClass.style" id="validationServer03" placeholder="Phone Number" v-model="form.phone_number" required>
      <div class="invalid-feedback">
        Invalid phone number.
      </div>
    </div>
    </div>
    <div class="col-md-11.6 mb-2 m-1.8">
      <label for="validationServer04">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3"><img src="https://www.svgrepo.com/show/380007/eye-password-hide.svg" alt="" height="23px"></span>
        </div>
      <input type="password" :class="'form-control is-'+ passwordClass.style" id="validationServer04" placeholder="Password" v-model="form.password" required>
      <div class="invalid-feedback">
        Password must be at least 6 characters long.
      </div>  
    </div>
    </div>
    <div class="col-md-11.6 mb-2 m-1.8">
      <label for="validationServer04">Verify Password:</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3"><img src="https://www.svgrepo.com/show/380007/eye-password-hide.svg" alt="" height="23px"></span>
        </div>
      <input type="password" :class="'form-control is-'+ passwordVerifyClass.style" id="validationServer04" placeholder="Password" v-model="passwordVerify" required>
      <div class="invalid-feedback">
        Passwords do not match.
      </div>
    </div>
    </div>
  </div>
</form>
<div class=" m-4">
  <button class="btn btn-primary w-100" @click="this.$emit('rigisterForm', form)"  :disabled="isFormInvalid"  data-bs-dismiss="modal" aria-label="Close"> Sing Up</button>
</div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: 'PopupRegister',
  data() {
    return {
      form : {
        first_name: '',
        last_name: '',
        email: '',
        phone_number: '',
        password: ''
      },
      passwordVerify : ''
    }
  },
  methods: {
    submitForm() {
      if (!this.isFormInvalid) {
        alert('Form submitted successfully!');
        // Add your form submission logic here
      } else {
        alert('Please fill out the form correctly.');
      }
    }
  },
  computed :{
    firstnameClass() {
      return this.form.first_name ? { style: 'valid' } : { style: 'invalid' };
    },
    lastnameClass() {
      return this.form.last_name ? { style: 'valid' } : { style: 'invalid' };
    },
    emailClass() {
      const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return emailPattern.test(this.form.email) ? { style: 'valid' } : { style: 'invalid' };
    },
    phoneClass() {
      const phonePattern = /^\+?[1-9]\d{1,14}$/;
      return phonePattern.test(this.form.phone_number) ? { style: 'valid' } : { style: 'invalid' };
    },
    passwordClass() {
      return this.form.password.length >= 6 ? { style: 'valid' } : { style: 'invalid' };
    },
    passwordVerifyClass() {
      return this.form.password === this.passwordVerify ? { style: 'valid' } : { style: 'invalid' };
    },
    isFormInvalid() {
      return (
        this.firstnameClass.style === 'invalid' ||
        this.lastnameClass.style === 'invalid' ||
        this.emailClass.style === 'invalid' ||
        this.phoneClass.style === 'invalid' ||
         this.passwordClass.style === 'invalid' ||
        this.passwordVerifyClass.style === 'invalid'
      );
    }

  }
}
</script>


