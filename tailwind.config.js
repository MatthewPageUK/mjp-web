const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/**/*.php',
    ],

    theme: {
        extend: {

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                orbitron: ['Orbitron'],
                adamina: ['Adamina'],
                gochi: ['Gochi Hand'],
            },

            colors: {
                primary: colors.zinc,
                secondary: colors.amber,
                highlight: colors.purple,
            },

            typography: ({ theme }) => ({
                primary: {
                  css: {
                    '--tw-prose-body': theme('colors.primary[100]'),
                    '--tw-prose-headings': theme('colors.secondary[400]'),
                    '--tw-prose-lead': theme('colors.primary[100]'),
                    '--tw-prose-links': theme('colors.secondary[400]'),
                    '--tw-prose-bold': theme('colors.primary[100]'),
                    '--tw-prose-counters': theme('colors.primary[100]'),
                    '--tw-prose-bullets': theme('colors.primary[100]'),
                    '--tw-prose-hr': theme('colors.primary[100]'),
                    '--tw-prose-quotes': theme('colors.primary[500]'),
                    '--tw-prose-quote-borders': theme('colors.primary[300]'),
                    '--tw-prose-captions': theme('colors.primary[100]'),
                    '--tw-prose-code': theme('colors.purple[400]'),
                    '--tw-prose-pre-code': theme('colors.primary[100]'),
                    '--tw-prose-pre-bg': theme('colors.primary[900]'),
                    '--tw-prose-th-borders': theme('colors.primary[300]'),
                    '--tw-prose-td-borders': theme('colors.primary[200]'),
                    '--tw-prose-invert-body': theme('colors.primary[200]'),
                    '--tw-prose-invert-headings': theme('colors.white'),
                    '--tw-prose-invert-lead': theme('colors.primary[300]'),
                    '--tw-prose-invert-links': theme('colors.white'),
                    '--tw-prose-invert-bold': theme('colors.white'),
                    '--tw-prose-invert-counters': theme('colors.primary[400]'),
                    '--tw-prose-invert-bullets': theme('colors.primary[600]'),
                    '--tw-prose-invert-hr': theme('colors.primary[700]'),
                    '--tw-prose-invert-quotes': theme('colors.primary[100]'),
                    '--tw-prose-invert-quote-borders': theme('colors.primary[700]'),
                    '--tw-prose-invert-captions': theme('colors.primary[400]'),
                    '--tw-prose-invert-code': theme('colors.white'),
                    '--tw-prose-invert-pre-code': theme('colors.primary[300]'),
                    '--tw-prose-invert-pre-bg': 'rgb(0 0 0 / 50%)',
                    '--tw-prose-invert-th-borders': theme('colors.primary[600]'),
                    '--tw-prose-invert-td-borders': theme('colors.primary[700]'),
                  },
                },
              }),


        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
