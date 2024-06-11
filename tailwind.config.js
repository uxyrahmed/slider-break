/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require('./vendor/tallstackui/tallstackui/tailwind.config.js')
    ],
    content: [
        "./app/providers/**/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/tallstackui/tallstackui/src/**/*.php',
        'node_modules/preline/dist/*.js',
    ],
  theme: {
    extend: {
        fontFamily: {
            'sans': ['Lexend', 'sans-serif'],
        },
        colors: {
            secondary: {
                DEFAULT: '#121212',
                50: '#4d4d4d',
                100: '#424242',
                200: '#363636',
                300: '#2b2b2b',
                400: '#1f1f1f',
                500: '#141414',
                600: '#080808',
                700: '#000000',
                800: '#000000',
                900: '#000000',

            }
        }
    },
  },
    plugins: [
        require('@tailwindcss/forms'),
        require('preline/plugin'),
    ],
}

