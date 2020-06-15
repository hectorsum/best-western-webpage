const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
    entry: './src/app.js',
    output: {
        path: __dirname + '/build',
        filename: 'bundle.js'
    },
    devServer:{
        port: 8080
    },
    module:{
        rules:[
            {
                test: /\.scss$/,
                use: [{
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader:'css-loader'
                    },
                    {
                        loader:'sass-loader'
                    }]
            },
            {
                test: /\.html$/i,
                loader: 'html-loader',
            },
            {
                test: /\.(gif|png|jpe?g|svg)$/,
                use: [
                    {
                        loader:'file-loader',
                        options:{
                            name: '[name].[ext]',
                            outputPath: 'img/',
                            useRelativePath: true
                        }
                    }
                ]
            },            
        ]
    },
    plugins:[
        new HtmlWebpackPlugin({
            template: './src/index.html'
        }),
        new MiniCssExtractPlugin({
            filename: 'bundle.css' //Output
        }),
    ]
}