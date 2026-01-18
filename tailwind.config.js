module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js",
      'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx,vue}',
      'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'
    ],
    theme: {
      extend: {
        fontFamily: {
            sans: ['"Outfit"', '"Hind Siliguri"', 'sans-serif'],
        },
        colors: {
          primary: '#A30000',
          secondary: '#004700'
        }
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }
