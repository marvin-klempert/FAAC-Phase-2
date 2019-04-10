module.exports = {
  plugins: {
    'autoprefixer': {},
    'cssnano': {
      preset: [
        'default',
        {
          discardComments: {
            removeAll: true
          }
        }
      ]
    },
    'postcss-dialog-polyfill': {}
  }
}