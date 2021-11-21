import  {person, x} from './side.js';


x(person)
    .then( (res) => console.log(res))
    .catch( e => console.log(e));
