/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/**/*.{html,js,php}"],
  theme: {
    screens:{
      sm: '576px',
      md: '760px',
      lg:'996px',
      xlg:'1220px'
    },
    container:{
      center: true,
      padding: '2rem'
    },
    extend: {
      fontFamily:{
        poppins: "'Poppins', sans-serif",
        roboto: "'Roboto', sans-serif"
      },
      colors:{
        'primary': '#1287db',
        
      },
      spacing: {
        '100%': '100%',
      }

    },
    
  },//
  variants:{
    extends:{
      display:['group-hover'],
      visibility :['group-hover']
    }
  },
  plugins: [
    require('@tailwindcss/forms')    
  ],
}
