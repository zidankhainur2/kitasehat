/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./build/**/*.{html,js,php}",
    "build/index.php",
    "./admin/*.{html,js,php}",
  ],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      colors: {
        primary: {
          DEFAULT: "#e11d48",
          hover: "#9f1239",
        },
        dark: "#0f172a",
        secondary: "#f1f5f9",
        rose: {
          50: "#fff1f2",
          100: "#ffe4e6",
          200: "#fecdd3",
          300: "#fda4af",
          400: "#fb7185",
          500: "#f43f5e",
          600: "#e11d48",
          700: "#be123c",
          800: "#9f1239",
          900: "#881337",
        },
      },
      screens: {
        "2xl": "1320px",
      },
    },
    backgroundImage: {
      hero: "url(/pbw/build/assets/img/bg2.jpg)",
    },
  },
  plugins: ["prettier-plugin-tailwindcss"],
};
