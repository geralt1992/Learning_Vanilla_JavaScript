const path = require('path');

module.exports = {
    mode: 'development',
    entry : {
        app : './src/app.js'
    },
    output : {
        path : path.resolve(__dirname, 'build'),
        filename : 'app.bundle.js'
    },
    module : {
        rules : [

        {
            test : /\.js?$/ ,
            exclude : /node_modules/,
            loader : 'babel-loader',

            //U VIDEU PIŠE DA TREBA, A MENI RADI BEZ
            /* query : {
                presets : ["@babel/preset-env"]
            } */
        },

        {
            test: /\.css$/i,
            exclude : /node_modules/,
            use: ['style-loader', 'css-loader'],
        },


    ]
    }
}
