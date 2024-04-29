<template>
    <div>
    <v-toolbar>
        <v-btn to="/index" icon>
            <v-icon>mdi-arrow-left</v-icon>
        </v-btn>
        <v-toolbar-title>Back</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn class="hidden-xs-only" icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>
    </v-toolbar>
</div>
    <div class="forget-password">
      <h2>Forget Password</h2>
      <form @submit.prevent="sendResetPasswordEmail">
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="email" required>
        </div>
        <button type="submit">Send Reset Password Email</button>
      </form>
      <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
      <div v-if="successMessage" class="success-message">{{ successMessage }}</div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        email: '',
        errorMessage: '',
        successMessage: ''
      };
    },
    methods: {
      sendResetPasswordEmail() {
        const requestData = {
          email: this.email
        };
        axios.post('http://localhost:8000/api/user/send_reset_password_email', requestData)
          .then(response => {
            this.successMessage = response.data.message;
            this.errorMessage = ''; 
          })
          .catch(error => {
            this.errorMessage = error.response.data.message;
            this.successMessage = ''; // Reset success message
          });
      }
    }
  };
  </script>
  
  <style scoped>
  .forget-password {
    max-width: 400px;
    margin: auto;
    margin-top: 20px;
  }
  
  form {
    margin-top: 20px;
  }
  
  label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
  }
  
  input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  .error-message {
    margin-top: 10px;
    color: #dc3545;
  }
  
  .success-message {
    margin-top: 10px;
    color: #28a745;
  }
  </style>
  