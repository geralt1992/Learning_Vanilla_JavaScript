import def from './side.js';

def();


import {obj} from './side.js';
import {pr} from './side.js';


pr(obj)
    .then( (res) => console.log(res))
    .catch( e => console.log(e));
