import {marin, person} from './dog.js';
import def_objc from './dog.js'
marin();
def_objc.jaName()
import default_sm from './dog.js';
person.prezime
default_sm();

<<<<<<< HEAD
import objekt from './dog.js';
import {gaga , search} from './dog.js';
import def_fun from './maca.js';

def_fun();


console.log(gaga.name)


search();


import d_f from './proba.js';

d_f();








=======
import {pi , pers , da} from './dog.js';
>>>>>>> 84381c71e2fdcf6872ae68ab8b514737524f9d27

console.log(pi , pers.name);


da()
.then( res => console.log(res))
.catch( e => console.log(e));



//IMPORT NAMED MODULES FROM OUTSIDE
import {person , sayHello , getPosts} from './lib';
//IMPORT DEFAULT MODULES FROM OUTSIDE
import default_object from './lib';

console.log(person.name);
console.log(default_object.location)


sayHello(person.name);

getPosts()
.then( (posts) => {
    let out = '';

    posts.forEach( (post) => {
        out+= `${post.title} <br><br><br>`;
    })

    document.getElementById('posts').innerHTML = out;
})
.catch( e => console.log(e));
