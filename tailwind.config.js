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
            1740: '1740px',
            1660: '1660px',
            1600: '1600px',
            1550: '1550px',
            1500: '1500px',
            1430: '1430px',
            1370: '1370px',
            1330: '1330px',
            1180: '1180px',
            1150: '1150px',
            960: '960px',
            770: '770px',
            680: '680px',
            670: '670px',
            600: '600px',
            540: '540px',
            480: '480px',
            420: '420px',
            360: '360px',
        }
    },
  },
  plugins: [],
}

