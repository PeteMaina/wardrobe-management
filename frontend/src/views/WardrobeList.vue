<template>
    <div class="container">
      <h1>Wardrobe Items</h1>
      <button @click="$router.push('/add')">Add Item</button>
      <ul v-if="wardrobe.items.length">
        <li v-for="item in wardrobe.items" :key="item.id">
          <img v-if="item.image" :src="'http://127.0.0.1:8000/storage/' + item.image" />
          <h3>{{ item.name }}</h3>
          <p>Category: {{ item.category }}</p>
          <button @click="$router.push(`/edit/${item.id}`)">Edit</button>
          <button @click="wardrobe.deleteItem(item.id)">Delete</button>
        </li>
      </ul>
      <p v-else>No items found.</p>
    </div>
  </template>
  
  <script setup>
  import { onMounted } from "vue";
  import { useWardrobeStore } from "@/stores/wardrobeStore";
  
  const wardrobe = useWardrobeStore();
  
  onMounted(() => {
    wardrobe.fetchItems();
  });
  </script>
  