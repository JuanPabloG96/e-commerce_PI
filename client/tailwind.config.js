/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{js,jsx,ts,tsx,php}",
    "./index.php"
  ],
  theme: {
    extend: {
      colors: {
        violet: {
            300: '#a78bfa',
            500: '#8b5cf6',
            600: '#7c3aed',
            700: '#6d28d9',
        }
      }
    },
  },
  plugins: [],
}

