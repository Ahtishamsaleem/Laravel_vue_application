<script setup>

</script>

<template>
  <div class="welcome">
    <nav>
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/register">Register</router-link></li>
        <li><router-link to="/login">Login</router-link></li>
      </ul>
    </nav>
    <div class="content">
      <h1>Welcome to Our Website!</h1>
      <p>This is the homepage of our website.</p>
    </div>
  </div>
</template>



<style scoped>
.welcome {
  text-align: center;
}
nav ul {
  list-style-type: none;
  padding: 0;
}
nav ul li {
  display: inline;
  margin-right: 10px;
}
nav ul li a {
  text-decoration: none;
  color: #333;
}
.content {
  margin-top: 50px;
}
</style>
