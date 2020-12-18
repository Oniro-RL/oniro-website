const path = require('path')
const UglifyJSPlugin = require('uglifyjs-webpack-plugin')
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const dev = true

let cssLoaders = [
    'style-loader', 
    MiniCssExtractPlugin.loader,
    { loader: 'css-loader', options: { importLoaders: 1, minimize: !dev }},
]

if (!dev) {
    cssLoaders.push({
        loader: 'postcss-loader',
        options: {
            plugins: (loader) => [
                require('autoprefixer')(
                    /*browsers: ['last 2 versions', 'ie > 8']*/
                )
            ]
        }
    },
    'sass-loader')
}

let config = {

    entry: { app:'./src/js/app.js' },
    output: {
        path: path.resolve('./public/dist/'),
        filename: '[name].js'
    },
    
    watch: dev,

    module: {
        rules: [
            { test: /\.(png|woff|woff2|eot|ttf|svg)$/, loader: 'url-loader?limit=100000' },
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: ['eslint-loader']
            },
            {
                test: /\.css$/,
                use: cssLoaders
            },
            {
                test: /\.scss$/,
                use: [
                    ...cssLoaders,
                    'sass-loader'
                ]
            }
        ]
    },

    devtool: dev ? "cheap-module-eval-source-map" : false,

    plugins: [
        new MiniCssExtractPlugin({
          // Options similar to the same options in webpackOptions.output
          // both options are optional
          filename: "[name].css",
          chunkFilename: "[id].css"
        })
      ]
}

if (!dev) {
    config.plugins.push(new UglifyJSPlugin({
        sourceMap: false
    }))
}
module.exports = config