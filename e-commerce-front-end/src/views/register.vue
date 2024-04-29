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
  <div class="user-register">
    <div id="Response_msg">{{ responseMessage }}</div>
    <h2>User Registration</h2>
    <form @submit.prevent="registerUser" class="form">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" v-model="username" required placeholder="Enter your username">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" v-model="email" required placeholder="Enter your email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" v-model="password" required placeholder="Enter your password">
      </div>
      <div class="form-group">
        <input type="checkbox" id="agree" v-model="agree" required>
        <label for="agree">I agree to the terms and conditions</label>
      </div>
      <button type="submit">Register</button>
      <br><br>
      <a href="/login">Already have account...</a>
    </form>
    
  </div>
</template>



<script>
import axios from 'axios';

export default {
  data() {
    return {
      username: '',
      email: '',
      password: '',
      agree: false, // Added agree data property
      responseMessage: ''

    };
  },
  methods: {
    registerUser() {

      if (!this.agree) {
        this.responseMessage = 'Please agree to the terms and conditions.';
        return;
      }

      axios.post('http://localhost:8000/api/user/register', {
        name: this.username,
        email: this.email,
        password: this.password,
        tc:this.agree
      })
      .then(response => {
        console.log('Registration successful:', response.data);
        this.responseMessage = response.data.message;
      })
      .catch(error => {
        console.error('Registration failed:', error.response.data.errors);
        this.responseMessage = error.response.data.errors;
        // this.responseMessage = 'Registration failed. Please try again.';
      });

      // Reset form fields after submission
      this.username = '';
      this.email = '';
      this.password = '';
      this.agree = false;
    }
  }
}
</script>


<style scoped>
#Response_msg {
  margin-top: 10px;
  padding: 10px;
  border-radius: 5px;
  /* background-color: #f44336; */
  color: #fff;
  text-align: center;
}
.user-register {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border-radius: 8px;
  background-color: #f9f9f9;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-top: 20px;
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
input[type="email"],
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
