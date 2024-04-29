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
<div class="change-password">
    <h2>Change Password</h2>
    <form @submit.prevent="changePassword">
        <div>
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" v-model="newPassword" required>
        </div>
        <div>
            <label for="confirmPassword">Confirm New Password:</label>
            <input type="password" id="confirmPassword" v-model="confirmPassword" required>
        </div>
        <button type="submit">Change Password</button>
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
            oldPassword: '',
            newPassword: '',
            confirmPassword: '',
            snackbar: false,
            snackbarText: ''
        };
    },
    methods: {
        changePassword() {
            if (this.newPassword === this.confirmPassword) {
                const token = localStorage.getItem('authToken');
                if (token) {
                    // Prepare the request data
                    const requestData = {
                        password: this.newPassword,
                        password_confirmation: this.confirmPassword
                    };
                    const config = {
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    };
                    axios.post('http://localhost:8000/api/user/changed_password', requestData, config)
                        .then(response => {
                            console.log('Password changed successfully:', response.data.message);
                            this.successMessage = response.data.message;
                        })
                        .catch(error => {
                            console.error('Error changing password:', error);
                            this.errorMessage = error.response.data.message;
                        });
                } else {
                    console.error('Token not found. User is not authenticated.');
                }
            } else {
                console.error('New password and confirm password do not match.');
            }
        }
    }
};
</script>

<style scoped>
.change-password {
    max-width: 400px;
    margin: auto;
    margin-top: 100px;
    padding: 20px;
    border: 2px solid #007bff;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
