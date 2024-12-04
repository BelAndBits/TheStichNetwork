import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'hero-image': "url('/images/hero-image.png')",
              },
            colors: {
                'beige': '#F8F3E6',   
                'light-yellow': '#F5D5A4',
                'green': '#b2c18e',
                'salmon': '#E7AD99',
                'maroon': '#544343',
              },
            keyframes: {
                fade: {
                  '0%': { opacity: 0 },
                  '100%': { opacity: 1 }
                },
              },
              animation: {
                'fade-in': 'fade 1s ease-out forwards'
              }
        },
    },

    plugins: [
        require('@tailwindcss/forms')   
    ],
};
