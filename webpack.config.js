const resolve = require('path').resolve;
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
    entry: './src/app.js',
    output: {
        path: resolve('build'),
        filename: 'bundle.js',
        publicPath: ''
    },
    devServer:{
        port: 3000
    },
    module:{
        rules:[
            {
              test: /\.(js|jsx)$/,
              exclude: /node_modules/,
              use: {
                loader: 'babel-loader',
              },
            },
            {
              test: /\.svg$/,
              use: [
                {
                  loader: 'svg-url-loader',
                  options: {
                    limit: 10000,
                  },
                },
              ],
            },
            {
                test: /\.(s*)css$/,
                use: [{
                        loader: MiniCssExtractPlugin.loader
                    },
                    'css-loader',
                    'sass-loader'
              ]
            },
            {
                test: /\.html$/i,
                use:[
                  {
                    loader: 'html-loader',
                  }
                ]
            },
            {
              test: /\.(png|gif|jpg|jpe?g)$/,
                use: [
                    {
                        'loader':'file-loader',
                        options:{
                            outputPath: './img/',
                        }
                    }
                ]
            },           
            {
                test: /\.mp4$/,
                use: 'file-loader?name=videos/[name].[ext]',
            },
        ]
    },
    plugins:[
        new HtmlWebpackPlugin({
            template: './src/index.html',
            filename: 'index.html',
        }),
        new MiniCssExtractPlugin({
            filename: 'bundle.css' //Output
        }),
    ]
}