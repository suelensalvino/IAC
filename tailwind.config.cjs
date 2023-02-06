/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.svelte"],
  theme: {
    extend: {
      colors: {
        gray: {
          900: "#202024",
          800: "#1F2937",
          700: "#7C7C8A",
          200: "#E2E8F0",
          100: "#E1E1E6",
        },
        green: {
          800: "#2F9E41",
        },
        white: "#FFF",
      }
    },
  },
  plugins: [],
};
