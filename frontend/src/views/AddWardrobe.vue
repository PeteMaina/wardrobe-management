
<template>
  <div class="container">
    <h2>Add Wardrobe Item</h2>
    <form @submit.prevent="addItem">
      <input v-model="item.name" placeholder="Item Name" required />
      <input v-model="item.category" placeholder="Category" required />
      <input v-model="item.color" placeholder="Color" required />
      <button type="submit">Add Item</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import api from '../api';

const router = useRouter();
const item = ref({ name: '', category: '', color: '' });

const addItem = async () => {
  try {
    await api.post('/wardrobe', item.value);
    alert('Item added successfully!');
    router.push('/dashboard');
  } catch (error) {
    console.error('Error adding item:', error);
  }
};
</script>

<style scoped>
.container {
  max-width: 400px;
  margin: auto;
  padding: 20px;
  border-radius: 10px;
  background: #f8f9fa;
}
button {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
}
</style>

