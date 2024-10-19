/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{js,jsx,ts,tsx,php}",
    "!./node_modules/**/*",
    "!./server/**/*",
    "!./vendor/**/*",
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

