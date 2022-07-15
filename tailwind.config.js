/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'yellow': '#f9f122',
    },
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
