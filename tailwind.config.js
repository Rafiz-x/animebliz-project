// import withMT from "@material-tailwind/html/utils/withMT";
// const withMT = require("@material-tailwind/html/utils/withMT");

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {

    extend: {
      
      screens: {
        'xs': '401px',   // Custom extra-small breakpoint
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1280px'
      },

      fontFamily: {
        nunito: ['Nunito', 'sans-serif'],
      },

    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
};