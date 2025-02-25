<template>
    <div>
      <h2>Welcome to Dashboard</h2>
      <button @click="logout">Logout</button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    methods: {
      async logout() {
        try {
          await axios.post('/logout', {}, {
            headers: {
              Authorization: `Bearer ${localStorage.getItem('token')}`
            }
          });
  
          localStorage.removeItem('token');
          axios.defaults.headers.common['Authorization'] = null;
          
          this.$router.push('/');
        } catch (error) {
          alert('Logout failed.');
        }
      }
    }
  };
  </script>
  