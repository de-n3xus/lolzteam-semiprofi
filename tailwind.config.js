/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
  theme: {
    extend: {
        colors: {
            'primary-gradient': {
                'from': '#26314E',
                'to': '#252B3D',
            },
            'secondary-gradient': {
                'from': '#66CBF9',
                'to': '#0FB5FF',
            }
        },
        screens: {
            1600: '1600px',
            1430: '1430px',
            1330: '1330px',
            770: '770px',
            360: '360px',
        }
    },
  },
  plugins: [],
}

