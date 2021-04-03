import def from './dog.js';
import {me , person} from './dog.js';

def();

me()
    .then( (res) => console.log(res))
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
