<script setup>
import { RouterView, RouterLink } from 'vue-router';
</script>

<template>
  <div>
    <nav class="bg-gray-800 p-4 text-white flex gap-4">
      <router-link to="/">Home</router-link>
      <router-link to="/register">Register</router-link>
      <router-link to="/login">Login</router-link>
    </nav>
    
    <router-view />
  </div>
</template>

<style>
nav {
  display: flex;
  gap: 15px;
}
</style>
