<template>
    <div class="container">
      <h1>{{ id ? "Edit Item" : "Add New Item" }}</h1>
      <form @submit.prevent="saveItem">
        <input v-model="item.name" placeholder="Name" required />
        <input v-model="item.category" placeholder="Category" required />
        <textarea v-model="item.description" placeholder="Description"></textarea>
        <input type="file" @change="handleFileUpload" />
        <button type="submit">{{ id ? "Update" : "Add" }}</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  import { useRoute, useRouter } from "vue-router";
  import { useWardrobeStore } from "@/stores/wardrobeStore";
  
  const route = useRoute();
  const router = useRouter();
  const wardrobe = useWardrobeStore();
  const id = route.params.id;
  const item = ref({ name: "", category: "", description: "", image: null });
  
  onMounted(async () => {
    if (id) {
      const existingItem = wardrobe.items.find((i) => i.id == id);
      if (existingItem) item.value = { ...existingItem };
    }
  });
  
  const handleFileUpload = (event) => {
    item.value.image = event.target.files[0];
  };
  
  const saveItem = async () => {
    const formData = new FormData();
    formData.append("name", item.value.name);
    formData.append("category", item.value.category);
    formData.append("description", item.value.description);
    if (item.value.image) formData.append("image", item.value.image);
  
    id ? await wardrobe.updateItem(id, formData) : await wardrobe.addItem(formData);
    router.push("/");
  };
  </script>
  