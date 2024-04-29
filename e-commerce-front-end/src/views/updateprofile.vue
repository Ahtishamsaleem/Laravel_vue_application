<script>
import axios from 'axios';
export default {
    data() {
        return {
            user: null,
            loading: true
        };
    },
    mounted() {
        const token = localStorage.getItem('authToken');
        if (token) {
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            axios.get('http://localhost:8000/api/user/logged_user', config)
                .then(response => {
                    this.user = response.data;
                    console.log(this.user.user.name);
                    this.loading = false;
                })
                .catch(error => {
                    console.error('Error fetching user data:', error);
                    this.loading = false;
                });
        } else {
            console.error('Error fetching user data');
        }
    }
}
</script>

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
<div class="user-detail">
    <div v-if="loading" class="loading">Loading...</div>
    <div v-else>
        <div class="user-info">
            <img :src="user.profilePic" alt="Profile Picture" class="profile-pic">
            <h1 class="user-name">Name: {{ user.user.name }}</h1>
            <p class="user-email">Email: {{ user.user.email }}</p>
        </div>
    </div>
</div>
</template>

  
<style scoped>
.user-detail {
    margin: 20px;
}

.loading {
    font-size: 24px;
    color: #666;
    margin-top: 20px;
}

.user-info {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.user-name {
    font-size: 28px;
    margin-bottom: 10px;
    color: #333;
}

.user-email {
    font-size: 18px;
    color: #666;
}

.profile-pic {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    margin-top: 20px;
}
</style>
