<template>
    <div>
     <b-alert v-model="showDismissibleAlert" variant="danger" dismissible>
        Dismissible Alert!
      </b-alert>
  
      <b-alert
        :show="dismissCountDown"
        dismissible
        variant="warning"
        @dismissed="dismissCountDown=0"
        @dismiss-count-down="countDownChanged"
      >
        <p> Are you want to unfavorite? {{ dismissCountDown }} seconds...</p>
        <b-progress
          variant="warning"
          :max="dismissSecs"
          :value="dismissCountDown"
          height="4px"
        ></b-progress>
      </b-alert>
  
      <b-button @click="showAlert" variant="info" class="m-1">
        Show alert with count-down timer
      </b-button>
    </div>
  </template>
  
  <script>
    export default {
      data() {
        return {
          dismissSecs: 10,
          dismissCountDown: 0,
          showDismissibleAlert: false
        }
      },
      methods: {
        countDownChanged(dismissCountDown) {
          this.dismissCountDown = dismissCountDown
        },
        showAlert() {
          this.dismissCountDown = this.dismissSecs
        }
      }
    }
  </script>