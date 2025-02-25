import { createRouter, createWebHistory } from 'vue-router';
import router from './router';


// Lazy load components for better performance
const Login = () => import('@/views/Login.vue');
const Register = () => import('@/views/Register.vue');
const Dashboard = () => import('@/views/Dashboard.vue');
const Wardrobe = () => import('@/views/Wardrobe.vue'); // New page for wardrobe management
const NotFound = () => import('@/views/NotFound.vue'); // 404 page

const routes = [
  { path: '/', component: Login },
  { path: '/register', component: Register, name: 'Register' },
  { 
    path: '/dashboard', 
    component: Dashboard, 
    meta: { requiresAuth: true }, 
    name: 'Dashboard' 
  },
  { 
    path: '/wardrobe', 
    component: Wardrobe, 
    meta: { requiresAuth: true }, 
    name: 'Wardrobe' 
  },
  { path: '/:pathMatch(.*)*', component: NotFound, name: 'NotFound' } // Catch-all route
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

// **Navigation Guard for Authentication**
router.beforeEach((to, from, next) => {
  const isAuthenticated = !!localStorage.getItem('token'); // Check if token exists

  if (to.meta.requiresAuth && !isAuthenticated) {
    next({ name: 'Login' }); // Redirect to login
  } else if ((to.path === '/' || to.path === '/register') && isAuthenticated) {
    next({ name: 'Dashboard' }); // Redirect logged-in users to Dashboard
  } else {
    next(); // Proceed to the route
  }
});

export default router;
