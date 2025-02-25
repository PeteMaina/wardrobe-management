// src/views/WardrobeList.vue
<template>
  <div>
    <h2>My Wardrobe</h2>
    <router-link to="/add-wardrobe">Add New Item</router-link>
    <ul>
      <li v-for="item in wardrobeItems" :key="item.id">
        {{ item.name }} - {{ item.category }}
        <button @click="editItem(item.id)">Edit</button>
        <button @click="deleteItem(item.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import api from '../api';
import { useRouter } from 'vue-router';

const wardrobeItems = ref([]);
const router = useRouter();

const fetchItems = async () => {
  const response = await api.get('/wardrobe');
  wardrobeItems.value = response.data;
};

const editItem = (id) => {
  router.push(`/edit-wardrobe/${id}`);
};

const deleteItem = async (id) => {
  await api.delete(`/wardrobe/${id}`);
  fetchItems();
};

onMounted(fetchItems);
</script>
