var webpack = require('webpack');
env = process.env.NODE_ENV || 'development';
env = '"'+env+'"'; //dont know why yet

module.exports = {
  //No longer needed
  resolve: {
    extensions: ['.js', '.vue', '.css', '.json'],
  },
  plugins: [
    // ...
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: env
      }
    })
  ]
}
