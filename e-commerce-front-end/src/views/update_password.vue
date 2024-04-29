<template>
     <v-toolbar>
        <v-btn to="/" icon>
            <v-icon>mdi-arrow-left</v-icon>
        </v-btn>
        <v-toolbar-title>Back</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn class="hidden-xs-only" icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>
    </v-toolbar>
    <div class="update-password">
      <h2>Update Password</h2>
      <form @submit.prevent="updatePassword">
        <div>
          <label for="password">New Password:</label>
          <input type="password" id="password" v-model="password" required>
        </div>
        <div>
          <label for="password">Confirmation Password:</label>
          <input type="password" id="password_confirmation" v-model="password_confirmation" required>
        </div>
        <button type="submit">Update Password</button>
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
        password: '',
        password_confirmation: '',
        errorMessage: '',
        successMessage: ''
      };
    },
    mounted() {
      const url = window.location.href;
      const token = url.split('/').pop();
      this.token = token;
    },
    methods: {
      updatePassword() {
        const requestData = {
          password: this.password,
          password_confirmation: this.password_confirmation,
        };
        axios.post(`http://localhost:8000/api/user/password_reset/${this.token}`, requestData)
          .then(response => {
            this.successMessage = response.data.message;
            this.errorMessage = ''; 
            return {
                        password: '',
                        password_confirmation: '',
                    };
          })
          .catch(error => {
            this.errorMessage = error.response.data.message;
            this.successMessage = '';
          });
      }
    }
  };
  </script>
  
  <style scoped>
  .update-password {
    padding: 20px;
    border: 2px solid #007bff;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);


    max-width: 400px;
    margin: auto;
    margin-top: 30px;
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
  