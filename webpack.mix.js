const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css')
    .extract(['vue', 'axios', 'vuex'])
    .options(
        {
            processCssUrls: false,
            postCss: [tailwindcss('./tailwind.config.js')]
        })
    .version()
    .webpackConfig({
      module: {
        rules: [
          {
            test: /\.pug$/,
            oneOf: [
              {
                resourceQuery: /^\?vue/,
                use: ['pug-plain-loader']
              },
              {
                use: ['raw-loader', 'pug-plain-loader']
              }
            ]
          }
        ]
      }
    });