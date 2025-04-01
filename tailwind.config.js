const { NoEmitOnErrorsPlugin } = require("webpack");
/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {
      typography: ({ theme }) => ({
        DEFAULT: {
          css: [
            {
              color: "#31261D",
              lineHeight: "1.6",
              fontSize: "1.25rem",
              maxWidth: "100ch",
              '--tw-prose-body': "#31261D",
              '--tw-prose-bullets': "#31261D",
              '--tw-prose-headings': "#31261D",
              '--tw-prose-links': "#002d72",
              '--tw-prose-bold': "#31261D",
              '--tw-prose-code': "#31261D",
              '--tw-prose-pre-code': "#31261D",
              '--tw-prose-pre-bg': "#f8f8f8",
              '--tw-prose-quotes': "#31261D",
              '--tw-prose-counters': "31261D",
              "ul > li::before": {
                backgroundColor: "#31261D",
              },
              "ol > li::before": {
                display: "none",
                backgroundColor: "#fefefe",
                color: "#31261D",
              },
              "ol > li": {
                display: "list-item",
              },
              "ul > li": {
                display: "list-item",
              },
              h1: {
                marginBottom: "0rem",
                fontSize: "2.25rem",
                fontWeight: "500",
                fontFamily: "quadon-bold, Georgia, serif",
              },
              h2: {
                marginTop: "0.5rem",
                marginBottom: "0.5rem",
                maxWidth: "90ch",
                fontSize: "2rem",
                fontWeight: "600",
                fontFamily: "gentona-semibold, system-ui, BlinkMacSystemFont, -apple-system, Segoe UI, sans-serif",
              },
              h3: {
                marginTop: "0.5rem",
                marginBottom: "0.5rem",
                fontSize: "1.6rem",
                fontWeight: "600",
                fontFamily: "gentona-semibold, system-ui, BlinkMacSystemFont, -apple-system, Segoe UI, sans-serif",
              },
              h4: {
                marginTop: "0.5rem",
                marginBottom: "0.5rem",
                fontSize: "1.25rem",
                fontWeight: "600",
                fontFamily: "gentona-semibold, system-ui, BlinkMacSystemFont, -apple-system, Segoe UI, sans-serif",
              },
              h5 : {
                fontWeight: "600",
                fontFamily: "gentona-semibold, system-ui, BlinkMacSystemFont, -apple-system, Segoe UI, sans-serif",
              },
              p: {
                marginTop: "1rem",
                marginBottom: "1rem",
                fontWeight: 300,
              },
              li: {
                maxWidth: "90ch",
                marginTop: "0rem",
                marginBottom: ".25rem",
                fontWeight: 300,
              },
              a: {
                textDecoration: "none",
                transition: "none",
                fontWeight: 300,
              },
              strong: {
                fontFamily: "Gentona-Bold, system-ui",
                fontWeight: 700,
              },
              "a strong": {
                color: "inherit"
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
              small: {
                fontSize: "75%",
              },
              blockquote: {
                fontStyle: "normal",
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
            fontSize: "1.25rem",
            maxWidth: "110ch",
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
            li: {
              lineHeight:"1.6",
            },
          },
        },
      }),
    },
  }
};
