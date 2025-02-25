<template>
    <div class="container">
      <h2>Edit Wardrobe Item</h2>
      <form @submit.prevent="updateItem">
        <input v-model="item.name" placeholder="Item Name" required />
        <input v-model="item.category" placeholder="Category" required />
        <input v-model="item.color" placeholder="Color" required />
        <button type="submit">Update Item</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import { useRouter, useRoute } from 'vue-router';
  import api from '../api';
  
  const router = useRouter();
  const route = useRoute();
  const item = ref({ name: '', category: '', color: '' });
  
  onMounted(async () => {
    try {
      const response = await api.get(`/wardrobe/${route.params.id}`);
      item.value = response.data;
    } catch (error) {
      console.error('Error fetching item:', error);
    }
  });
  
  const updateItem = async () => {
    try {
      await api.put(`/wardrobe/${route.params.id}`, item.value);
      alert('Item updated successfully!');
      router.push('/dashboard');
    } catch (error) {
      console.error('Error updating item:', error);
    }
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border-radius: 15px;
    background: #f8f9fa;
  }
  button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
  }
  </style>
  