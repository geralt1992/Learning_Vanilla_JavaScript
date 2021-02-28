import df from "./dog.js";

df.name;

import {ja} from "./dog.js";
ja();


import {pet} from "./dog.js";
pet.vrsta;

import def_objc from "./dog.js";
console.log(def_objc.name);

import {k , b} from "./lib.js";

console.log(b.grad);

import def_fun from "./lib.js";

def_fun();

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
