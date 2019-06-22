module.exports = {
  theme: {
      pagination:{
          color: colors['teal-dark'],
      },
    extend: {}
  },
  variants: {},
  plugins: [
      require('tailwindcss-plugins/pagination')({
          /* Customizations here... */
      }),
  ]
};
