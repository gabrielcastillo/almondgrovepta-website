/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./partials/*.html",
    "./**/*.php",
    "./src/*.js"
  ],
  mode: 'jit',
  theme: {
    extend: {
      colors: {
        black: {
          DEFAULT: '#000000',
          light: '#1a1a1a',
          dark: '#000000',
          lighter: '#5e5e5e',
        }
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio')
  ],
}

