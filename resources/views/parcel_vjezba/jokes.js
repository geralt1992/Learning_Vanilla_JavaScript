module.exports = {

    getOne : function() {

    return new Promise( (reslove, reject) => {
        url = 'https://api.chucknorris.io/jokes/random';
        fetch(url)
        .then( res => res.json())
        .then( data => {
            console.log(data);
            reslove(data.value);
        })
        });
    }
}



//PRIMJER KAKO MOZES UZETI I MODUL IZ VANA NE SAMO SVOJ
//AXIOS (npm install axios) - stvori se folder i iz njega to povučeš!
//JQUERY ISTO


/*
import $ from 'jquery';

*/



/*

import axios from 'axios';
    export const jokes = {
        getOne : function() {

        return new Promise( (reslove, reject) => {
            url = 'https://api.chucknorris.io/jokes/random';
            axios.get(url)
            .then( res => {
                reslove(res.data.value);
            });
        });
    }
}
*/
