module.exports = {
    entry : './src/js/app.js',
    output : {
        path: __dirname,
        filename : 'bundle.js'
    },
    module: {
        rules: [
            {test: /\.css$/,
            loader: "style-loader!css-loader"},
            //this will effect all files that have js extension, isto gore i za css
            {
            test: /\.js$/ ,
            loader: 'babel-loader' ,
            exclude: /node_modules/ ,
            query:{
                presets:['es2015']
            }}
        ]
    }
}
