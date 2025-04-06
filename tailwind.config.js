import defaultTheme from 'tailwindcss/defaultTheme';
import preset from './vendor/filament/support/tailwind.config.preset';

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    darkMode: 'class', // Povolení dark mode
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        fontFamily: {
            'sans': ['Array', 'sans-serif'],
            'serif': ['Khand', 'serif'],
            'BebasNeue': ['BebasNeue', 'cursive'],
            'Roboto': ['Roboto', 'sans-serif'],
        },
        extend: {
            spacing: {
                '128': '32rem',
                '144': '36rem',
            },
            borderRadius: {
                '4xl': '2rem',
            },
            animation: {
                pulse: 'pulseEffect 1.5s infinite alternate',
            },
            keyframes: {
                pulseEffect: {
                    '0%': { textShadow: '0 0 10px #fff, 0 0 20px #3b82f6, 0 0 30px #3b82f6' },
                    '100%': { textShadow: '0 0 5px #fff, 0 0 10px #3b82f6, 0 0 15px #3b82f6' },
                },
            },
        },
    },
    plugins: [],
};
