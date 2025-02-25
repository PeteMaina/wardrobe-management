import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./index.html",
      "./src/**/*.{vue,js,ts,jsx,tsx}" // Ensures Tailwind scans Vue files
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  };
  
