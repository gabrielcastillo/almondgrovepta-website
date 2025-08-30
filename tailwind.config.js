 /** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,js,php}",
    "!./node_modules/**",
    "!./vendor/**",
    "../../plugins/agpta/**/*.{html,js,php}"
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

