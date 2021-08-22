    import rand from './side.js'

    rand();


    import {obj, pro} from './side.js'


    pro(obj)
        .then( (res) => console.log(res))
        .catch( e => console.log(e));
