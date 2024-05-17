/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",  
    "./src/Form/**/*.php"  
  ],
  theme: {
    colors: {
      'black': '#0f0d03',
      'gold-dark': '#ddb00e',
      'gold': '#edc328',
      'brown': '#786214',
      'brown-dark': '#4f410d',
    },
    fontFamily: {
      sans: ['Verdana', 'sans-serif'],
    extend: {},
  },
  plugins: [],
}
}
