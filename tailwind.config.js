const { NoEmitOnErrorsPlugin } = require('webpack');

module.exports = {
  purge: [
    "*.php",
    "template-parts/*.php",
    "template-parts/*/*.php",
    "template-parts/*/*/*.php",
    "page-templates/*.php",
    "inc/*.php",
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
			primary: "hsl(260 100% 50%)",
			primary: "#31261D",
			secondary: "#002d72",
			transparent: "transparent",
			black: "#31261D",
			"old-black": "#2c2c33",
			"grey-darkest": "#4A484C",
			grey: "#e5e2e0",
			"grey-lightest": "#F8F8F8",
			"grey-cool": "#bfccd9",
			white: "#fefefe",
			blue: "#002d72",
			"blue-light": "#68ace5",
			"blue-lightest": "#c3dcf5",
			"blue-sky": "#418fde",
    },
    fontSize: {
			sm: ".875rem",
			base: "1rem",
			lg: "1.125rem",
			xl: "1.25rem",
			"2xl": "1.5rem",
			"3xl": "1.875rem",
			"4xl": "2.25rem",
			"5xl": "3rem",
    },
    fontWeight: {
      normal: "400",
      bold: "700",
    },
    ratios: {
      xs: 1.125,
      sm: 1.333,
      md: 1.5,
      lg: 1.618,
      xl: 2,
      "2xl": 3,
    },
		fontFamily: {
			sans: [
				"Gentona-Light",
				"system-ui",
				"BlinkMacSystemFont",
				"-apple-system",
				"Segoe UI",
				"sans-serif"
			],
			serif: [
				"Quadon",
				"Georgia",
				"serif"
			],
			mono: [
				"Menlo",
				"Monaco",
				"Consolas",
				"Liberation Mono",
				"Courier New",
				"monospace"
			],
			heavy: [
				"Gentona-Bold",
				"system-ui",
				"BlinkMacSystemFont",
				"-apple-system",
				"Segoe UI",
				"sans-serif"
			],
			semi: [
				"Gentona-SemiBold",
				"system-ui",
				"BlinkMacSystemFont",
				"-apple-system",
				"Segoe UI",
				"sans-serif"
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
						backgroundColor: "#31261D"
					},
					"ol > li::before": {
						backgroundColor: "#fefefe",
						color: "#31261D"
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
					},
					h2: {
						marginTop: "0rem",
						marginBottom: "0rem",
						color: "#31261D",
						maxWidth: "90ch"
					},
					h3: {
						marginTop: "0rem",
						marginBottom: "0rem",
						fontSize: "1.6rem",
						color: "#31261D"
					},
					h4: {
						marginTop: "0rem",
						marginBottom: "0rem",
						color: "#31261D",
						fontSize: "1.25rem"
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
						transition:"none",
					},
					strong: {
						color: "#31261D",
						fontFamily: "Gentona-Bold, system-ui",
					},
					code: {
						color: "#31261D"
					},
					table: {
						fontSize: "1rem"
					},
					thead: {
						color: "#31261D"
					},
					img: {
						marginTop: "1rem",
						marginBottom: "1rem"
					},
					hr: {
						marginTop: "1.25rem",
						marginBottom: "1.25rem",
						borderColor: "#bfccd9"
					},
					figure: {
						marginTop: ".5rem",
						marginBottom: ".5rem",
					},
				},
			],
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography')({
		modifiers: ['sm','lg'],
	}),
  ],
  variants: {
    borderWidth: ["responsive", "hover", "focus"],
  },
};
