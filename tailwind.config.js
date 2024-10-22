/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    screens: {
    //   ns: '0px',
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      xxl: '1536px',
    },
    colors: {
      pastelYellow: '#FDFD96', // Soft Yellow
      pastelBlue: '#A2C2E6', // Soft Blue
      pastelPink: '#F7C6C7', // Soft Pink
      customGray: '#000000',
      navButton: '#FFFCFC',
      customGray1: '#494A4C',
      customRed: '#AC0C2E',
      customGray2: '#ECECEC',
      customGreen:'#0C9600',
      customNotif: '#FFEBE5',
      activeButton: '#BC2847',
      disabledButton: '#9E9E9E',
      customYellow: "#F4EB00",
      gray: colors.gray,
      blue: colors.sky,
      red: colors.rose,
      pink: colors.fuchsia,
      amber: {
        50: '#fffbeb',
        100: '#fef3c7',
        200: '#fde68a',
        300: '#fcd34d',
        400: '#fbbf24',
        500: '#f59e0b',
        600: '#d97706',
        700: '#b45309',
        800: '#92400e',
        900: '#78350f',
      },
      indigo: {  // Add a new "indigo" property
        50: '#e8f4f8',
        100: '#d3e2e6',
        200: '#b3d7df',
        300: '#92cbda',
        400: '#71afd4',
        500: '#4f86c7',
        600: '#386094',
        700: '#204164',
        800: '#12263a',
        900: '#0a192a',
      },
      primary: '#AC0C2E', 
    },
    fontFamily: {
    //   sans: ['Graphik', 'sans-serif'],
    //   serif: ['Merriweather', 'serif'],
      'sans': ['DM Sans', 'sans-serif'],
    },
    extend: {
      spacing: {
        '128': '32rem',
        '144': '36rem',
      },
      borderRadius: {
        '8px': '8px',
      },
      width: {
        '114': '114px',
        '250': '250px',
      },
      height: {
        '32': '32px',
      },
      borderWidth: {
        '2': '2px',
      },
      borderColor: {
        'gray-light': '#D1D5DB',
      },
    }

  },
  plugins: [
    function ({ addUtilities }) {
      const newUtilities = {
        '.footer': {
          backgroundColor: '#AC0C2E',
          color: '#FFFFFF',
          textAlign: 'center',
          padding: '10px',
          position: 'fixed',
          bottom: '0',
          width: '100%',
        },
      };

      addUtilities(newUtilities, ['responsive', 'hover']);
    },
    require('flowbite/plugin'),
  ],
}
