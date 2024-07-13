<template>
    <form @submit.prevent="processPayment">
      <div>
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" v-model="cardNumber" required>
      </div>
      <div>
        <label for="expiration">Expiration Date:</label>
        <input type="text" id="expiration" v-model="expiration" required>
      </div>
      <div>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" v-model="cvv" required>
      </div>
      <button type="submit">Pay with MasterCard</button>
    </form>
  </template>