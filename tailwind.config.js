const { NoEmitOnErrorsPlugin } = require("webpack");

module.exports = {
  mode: "jit",
  purge: [
    "./comments.php",
    "./header.php",
    "./footer.php",
    "./single.php",
    "./index.php",
    "./404.php",
    "./page.php",
    "./sidebar.php",
    "./search.php",
    "./searchform.php",
    "./front-page.php",
    "./archive.php",
    "./home.php",
    "./template-parts/*.php",
    "./template-parts/*/*.php",
    "./template-parts/*/*/*.php",
    "./page-templates/*.php",
    "./inc/*.php",
    "./resources/js/*.js",
    "./resources/css/wordpress.css",
  ],
  theme: {
    screens: {
      sm: "36rem",
      md: "48rem",
      lg: "62rem",
      xl: "80rem",
      "2xl": "100rem",
    },
    colors: {
      primary: "#31261D",
      "old-black": "#2c2c33",
      "grey-darkest": "#4A484C",
      grey: "#e5e2e0",
      "grey-lightest": "#F8F8F8",
      "grey-cool": "#bfccd9",
      white: "#fefefe",
      blue: "#002d72",
      "blue-light": "#68ace5",
    },
    fontSize: {
      base: "1rem",
      lg: "1.125rem",
      xl: "1.25rem",
      "2xl": "1.5rem",
      "3xl": "1.875rem",
      "4xl": "2.25rem",
    },
    fontWeight: {
      normal: "400",
      semibold: "600",
      bold: "700",
    },
    fontFamily: {
      sans: [
        "Gentona-Light",
        "system-ui",
        "BlinkMacSystemFont",
        "-apple-system",
        "Segoe UI",
        "sans-serif",
      ],
      serif: ["Quadon", "Georgia", "serif"],
      mono: [
        "Menlo",
        "Monaco",
        "Consolas",
        "Liberation Mono",
        "Courier New",
        "monospace",
      ],
      heavy: [
        "Gentona-Bold",
        "system-ui",
        "BlinkMacSystemFont",
        "-apple-system",
        "Segoe UI",
        "sans-serif",
      ],
      semi: [
        "Gentona-SemiBold",
        "system-ui",
        "BlinkMacSystemFont",
        "-apple-system",
        "Segoe UI",
        "sans-serif",
      ],
    },
    extend: {
      typography: {
        DEFAULT: {
          css: [
            {
              color: "#31261D",
              lineHeight: "1.6",
              fontSize: "1.25rem",
              maxWidth: "100ch",
              "ul > li::before": {
                backgroundColor: "#31261D",
              },
              "ol > li::before": {
                backgroundColor: "#fefefe",
                color: "#31261D",
              },
              "ol > li": {
                display: "flow-root",
              },
              "ul > li": {
                display: "flow-root",
              },
              h1: {
                marginBottom: "0rem",
                color: "#31261D",
                fontSize: "2.25rem",
              },
              h2: {
                marginTop: "0.5rem",
                marginBottom: "0.5rem",
                color: "#31261D",
                maxWidth: "90ch",
                fontSize: "2rem",
              },
              h3: {
                marginTop: "0.5rem",
                marginBottom: "0.5rem",
                fontSize: "1.6rem",
                color: "#31261D",
              },
              h4: {
                marginTop: "0.5rem",
                marginBottom: "0.5rem",
                color: "#31261D",
                fontSize: "1.25rem",
              },
              p: {
                marginTop: "1rem",
                marginBottom: "1rem",
              },
              li: {
                maxWidth: "90ch",
                marginTop: "0rem",
                marginBottom: ".25rem",
              },
              a: {
                color: "#002d72",
                textDecoration: "none",
                transition: "none",
              },
              strong: {
                color: "#31261D",
                fontFamily: "Gentona-Bold, system-ui",
              },
              code: {
                color: "#31261D",
              },
              table: {
                fontSize: "1rem",
                marginTop: ".5rem",
                marginBottom: ".5rem",
              },
              thead: {
                color: "#31261D",
              },
              img: {
                marginTop: "1rem",
                marginBottom: "1rem",
              },
              hr: {
                marginTop: "1.25rem",
                marginBottom: "1.25rem",
                borderColor: "#bfccd9",
              },
              figure: {
                marginTop: ".5rem",
                marginBottom: ".5rem",
              },
              pre: {
                backgroundColor: "#f8f8f8",
                color: "#31261d",
              },
              small: {
                fontSize: "75%",
              },
              blockquote: {
                color: "#31261d",
                fontFamily: "Gentona-SemiBold, system-ui",
                fontWeight: "600",
                borderLeftColor: "#bfccd9",
              },
              "blockquote p:first-of-type::before": {
                content: "none",
              },
            },
          ],
        },
        lg: {
          css: {
            h2: {
              marginTop: "0.5rem",
              marginBottom: "0.5rem",
            },
            h3: {
              marginTop: "0.5rem",
              marginBottom: "0.5rem",
            },
            img: {
              marginTop: "0rem",
              marginBottom: "0rem",
            },
          },
        },
      },
    },
  },
  plugins: [
    require("@tailwindcss/typography")({
      modifiers: ["lg"],
    }),
  ],
  variants: {
    borderWidth: ["responsive", "hover", "focus"],
  },
};
