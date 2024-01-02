const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const path = require("path");
const glob = require("glob-all");
const { PurgeCSSPlugin } = require("purgecss-webpack-plugin");

/* ==========================================================================
  Config
  ========================================================================== */
const config = {
  proxyUrl: "https://krieger.local/mbi",
  injectChanges: true,
  port: 3000,
  openOnStart: true,
  pathToLocalSSLCert: "",
  pathToLocalSSLKey: "",
  filesToWatch: [
    "./**/*.php",
    "./**/*.html",
    "resources/**/*.css",
    "resources/js/**/*.js",
    "resources/img/*",
    "tailwind-config.js",
  ],
};

/* ==========================================================================
  Purge CSS Extractors
  ========================================================================== */
const TailwindExtractor = (content) => {
  return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
};

/* ==========================================================================
  Laravel Mix Config
  ========================================================================== */
mix
  // handle JS files
  .scripts(["resources/js/twentytwenty.js", "resources/js/navbar.js"], "dist/js/bundle.min.js")
  //.disableNotifications()

  .postCss("./resources/css/style.css", "./dist/css/style.css", [
    require("tailwindcss")("./tailwind.config.js"),
  ])

  //Minify and move js to dist directory
  //.babel(
  //  ["resources/js/app.js"], "dist/js/bundle.js")

  // Move images to dist directory
  .copyDirectory("resources/images", "dist/images")

  // Move fonts to dist directory
  .copyDirectory("resources/fonts", "dist/fonts")

  .options({
    processCssUrls: false,
  })

  // BrowserSync
  .browserSync({
    proxy: config.proxyUrl,
    open: config.openOnStart,
    port: config.port,
    files: config.filesToWatch,
  });

// remove unused CSS from files - only used when running npm run production
if (mix.inProduction()) {
  mix.options({
    uglify: {
      uglifyOptions: {
        mangle: true,

        compress: {
          warnings: false, // Suppress uglification warnings
          pure_getters: true,
          conditionals: true,
          unused: true,
          comparisons: true,
          sequences: true,
          dead_code: true,
          evaluate: true,
          if_return: true,
          join_vars: true,
        },

        output: {
          comments: false,
        },

        exclude: [/\.min\.js$/gi], // skip pre-minified libs
      },
    },
  });

  // Purge CSS config
  // more examples can be found at https://gist.github.com/jack-pallot/217a5d172ffa43c8c85df2cb41b80bad
  mix.webpackConfig({
    plugins: [
      new PurgeCSSPlugin({
        paths: glob.sync([
          path.join(__dirname, "./**/*.php"),
          path.join(__dirname, "resources/js/**/*.js")
        ]),

        extractors: [
          {
            extractor: TailwindExtractor,
            extensions: ["html", "php", "js"],
          },
        ],

        safelist: [
          "p",
          "h1",
          "h2",
          "h3",
          "h4",
          "h5",
          "h6",
          "hr",
          "ol",
          "ol li",
          "ul",
          "ul li",
          "em",
          "b",
          "strong",
          "blockquote",
          "cite",
          "wp-block-quote",
          "main-navigation",
          "nav-menu",
          "menu-main-menu-container",
          "menu-all-pages-container",
          "menu-item-has-children",
          "toggled",
          "menu-toggle",
          "sub-menu",
          "callout",
          "breadcrumbs",
          "current-item",
          "current_page_item",
          "page-numbers",
          "sticky",
          "current_page_ancestor",
          "loop-entry",
          "role-title",
          "people",
          ":after",
          ":before",
          "form",
          "ginput_container",
          "gform_footer",
          "gfield_label",
          "blog",
          "wp-post-image",
          /^!/,
          /^has-/,
          /(^wp-block-)\w+/,
          /(^c-accordion)\w+/,
          /^wp-block-/,
          /^class/,
          /^align/,
          /^schema/,
          /([href$=])\w+/,
        ],
      }),
    ],
  });
}
