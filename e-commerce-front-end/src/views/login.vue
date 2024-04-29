<template>
  <div>
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
</div>
    <div class="login">
      <h2>Login</h2>
      <form @submit.prevent="loginUser" class="form">
        <div class="form-group">
          <label for="email">Eamil:</label>
          <input type="text" id="email" v-model="email" required placeholder="Enter your Email">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" v-model="password" required placeholder="Enter your password">
        </div>
        <button type="submit">Login</button>
      </form>
      <br><br>
      <a href="/forget_password">Forget Password...</a>
      <div class="response-msg">{{ responseMessage }}</div>
    </div>
  </template>
  
  <script>
import axios from 'axios';
import router from '@/router'; // Import Vue Router instance

export default {
  data() {
    return {
      email: '',
      password: '',
      responseMessage: ''
    };
  },
  methods: {
    loginUser() {
      axios.post('http://localhost:8000/api/user/login', {
        email: this.email,
        password: this.password
      })
      .then(response => {
        console.log('Login successful:', response.data);

        const token = response.data.token;
        localStorage.setItem('authToken', token);
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

        this.responseMessage = response.data.message;
        router.push('/index');
      })
      .catch(error => {
        console.error('Login failed:', error);
        if (error.response) {
          this.responseMessage = error.response.data.errors?error.response.data.errors:error.response.data.message;
        } else {
          this.responseMessage = 'Login failed. Please try again later.';
        }
      });

      // Reset form fields after submission
      this.username = '';
      this.password = '';
    }
  }
}
</script>
  
  <style scoped>
  .login {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
  }
  
  h2 {
    margin-bottom: 20px;
    text-align: center;
  }
  
  .form-group {
    margin-bottom: 15px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  
  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
  }
  
  button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  </style>
  