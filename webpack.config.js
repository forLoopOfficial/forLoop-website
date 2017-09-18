var webpack = require('webpack');
env = process.env.NODE_ENV || 'development';
env = '"'+env+'"'; //dont know why yet

module.exports = {
  //No longer needed
  output: {
    publicPath: '/js/'
  },
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
  ],
  module: {
    rules: [
      {
        test: /\.json$/,
        loader: 'json-loader'
      },
    ]
  }
}
