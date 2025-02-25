import { defineStore } from "pinia";
import axios from "axios";

export const useWardrobeStore = defineStore("wardrobe", {
  state: () => ({
    items: [],
    token: localStorage.getItem("token") || "",
  }),
  actions: {
    async fetchItems() {
      try {
        const response = await axios.get("http://127.0.0.1:8000/api/wardrobe", {
          headers: { Authorization: `Bearer ${this.token}` },
        });
        this.items = response.data;
      } catch (error) {
        console.error("Error fetching items:", error);
      }
    },
    async addItem(item) {
      await axios.post("http://127.0.0.1:8000/api/wardrobe", item, {
        headers: { Authorization: `Bearer ${this.token}` },
      });
      this.fetchItems();
    },
    async updateItem(id, item) {
      await axios.put(`http://127.0.0.1:8000/api/wardrobe/${id}`, item, {
        headers: { Authorization: `Bearer ${this.token}` },
      });
      this.fetchItems();
    },
    async deleteItem(id) {
      await axios.delete(`http://127.0.0.1:8000/api/wardrobe/${id}`, {
        headers: { Authorization: `Bearer ${this.token}` },
      });
      this.fetchItems();
    },
    async login(credentials) {
      const response = await axios.post("http://127.0.0.1:8000/api/login", credentials);
      this.token = response.data.token;
      localStorage.setItem("token", this.token);
    },
    logout() {
      this.token = "";
      localStorage.removeItem("token");
    },
  },
});
