<script setup>
import { ref } from 'vue';
import api from '../api';
import { useRouter } from 'vue-router';

const email = ref('');
const password = ref('');
const errorMsg = ref('');
const isLoading = ref(false);
const router = useRouter();

const login = async () => {
    if (!email.value || !password.value) {
        errorMsg.value = "Email and password are required!";
        return;
    }

    isLoading.value = true;
    errorMsg.value = '';

    try {
        const response = await api.post('/login', { 
            email: email.value, 
            password: password.value 
        });

        localStorage.setItem('token', response.data.token);
        alert('Login Successful! 🎉');
        router.push('/dashboard'); // Redirect using Vue Router
    } catch (error) {
        errorMsg.value = error.response?.data?.message || "Invalid credentials!";
    } finally {
        isLoading.value = false;
    }
};
</script>

<template>
    <div class="login-container">
      <h2>Login Page Loaded</h2> <!-- Test message -->
      <input v-model="email" placeholder="Email" type="email" />
      <input v-model="password" placeholder="Password" type="password" />
      <button @click="login">Login</button>
      <p v-if="errorMsg">{{ errorMsg }}</p>
    </div>
  </template>
  

<style scoped>

.login-container {
    max-width: 350px;
    margin: auto;
    padding: 20px;
    border-radius: 10px;
    background: #f8f9fa;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:disabled {
    background-color: #6c757d;
}

.error {
    color: red;
    margin-top: 10px;
}
</style>
