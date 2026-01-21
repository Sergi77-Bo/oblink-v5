/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          primary: '#FF6600',
          secondary: '#62929E',
          accent: '#9A48D0',
          dark: '#303030',
          light: '#F8F9FA',
        }
      },
      fontFamily: {
        primary: ['Montserrat', 'sans-serif'],
        secondary: ['Inter', 'sans-serif'],
      }
    },
  },
  plugins: [],
}
