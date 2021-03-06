

import default_sm from './dog.js';

default_sm();

import {pi , pers , da} from './dog.js';

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
