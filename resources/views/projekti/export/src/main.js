import {object , ime} from './side.js';
import nesto from './side.js';

console.log(object.name);


ime(object.name)
.then( (data) => console.log(data))
.catch( e => console.log(e));



nesto();
