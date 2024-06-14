const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/**/*.php',
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    safelist: [
        'bg-default-light',
        'dark:bg-default-dark',
        'bg-work-light',
        'dark:bg-work-dark',
        'bg-library-light',
        'dark:bg-library-dark',
    ],
    theme: {
        extend: {

            backgroundImage: {
                'default-light': "url('https://media.mjp.co/storage/users/mjp-web/site/mjp-back-light.jpg')",
                'default-dark': "url('https://media.mjp.co/storage/users/mjp-web/site/mjp-back-dark.jpg')",
                'work-light': "url('https://media.mjp.co/storage/users/mjp-web/site/mjp-back-work-light.jpg')",
                'work-dark': "url('https://media.mjp.co/storage/users/mjp-web/site/mjp-back-work-dark.jpg')",
                'library-light': "url('https://media.mjp.co/storage/users/mjp-web/site/mjp-back-library-light.jpg')",
                'library-dark': "url('https://media.mjp.co/storage/users/mjp-web/site/mjp-back-library-dark.jpg')",
            },
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
                    '--tw-prose-quotes': theme('colors.primary[300]'),
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
                secondary: {
                    css: {
                      h2: {
                        marginTop: '0.5em',
                        marginBottom: '0.5em',
                        paddingBottom: '0.25em',
                        borderColor: theme('colors.highlight[200]'),
                        borderBottomWidth: 1,
                      },
                      '--tw-prose-body': theme('colors.primary[100]'),
                      '--tw-prose-headings': theme('colors.highlight[300]'),
                      '--tw-prose-lead': theme('colors.primary[100]'),
                      '--tw-prose-links': theme('colors.highlight[400]'),
                      '--tw-prose-bold': theme('colors.primary[100]'),
                      '--tw-prose-counters': theme('colors.primary[100]'),
                      '--tw-prose-bullets': theme('colors.primary[100]'),
                      '--tw-prose-hr': theme('colors.primary[100]'),
                      '--tw-prose-quotes': theme('colors.primary[300]'),
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

            keyframes: {
                wiggle: {
                    '0%, 100%': { transform: 'rotate(0deg) scale(1)' },
                    '30%': { transform: 'rotate(5deg) scale(1.2) translateX(7%)' },
                    '70%': { transform: 'rotate(-5deg) scale(1.2) translateX(-7%)' },
                },
                spanner : {
                    '0%, 100%': { transform: 'rotate(0deg) scale(1)', transformOrigin: '4px 4px' },
                    '50%': { transform: 'rotate(-45deg)', transformOrigin: '4px 4px' },
                }
            },

            animation: {
                wiggle: 'wiggle 1s ease-in-out infinite',
                spanner: 'spanner 1s ease-in-out infinite',
            },

        },
    },
    variants: {
        extend: {
            backgroundImage: ['dark'],
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
