const _ = require('lodash');
//convenction for loadash is _ underschore taj od gore

const numbers = [23, 22, 21, 1 , 90];

_.each(numbers , function(number , i){
    console.log(number);
});
