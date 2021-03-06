const p = () => {
    console.log('da?');
}

export default p();


let pers = {
    name : 'marin',
    surname = 'sabljo'
}

const pi = 3.14;

export {pers , pi , da()};


const da = () => {
    return new Promise( (reslove, reject) => {
        setTimeout(() => {
            reslove('super!');
        }, 1000);
    })
}

const funkcija = () => {
    return 'JEBENICA';
}


funkcija();
