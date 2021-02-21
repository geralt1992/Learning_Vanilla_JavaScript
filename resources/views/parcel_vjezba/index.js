const jokes = require('./jokes.js');

jokes.getOne()
.then(joke => {
    document.getElementById('joke').innerHTML = joke;
});



//fs module is default no.js module dolazi s fileySystem Modelom
//to da očita onaj txt file, nisam skontao najbolje!
import fs from 'fs';

const copy = fs.readFileSync(__dirname + '/copyright.txt' , 'utf8');
document.getElementById('copy').innerHTML = copy;





//JQUERY ISTO izvana doveden, radi primjera
/*
import $ from 'jquery';

jokes.getOne()
.then(joke => {
    $('#joke').text(joke);
})

*/
