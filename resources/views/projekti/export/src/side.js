

let person = {
    name: 'marin',
    surname: 'sabljo'
}


const x  = (data) => {
    return new Promise( (resolve, reject) => {
        setTimeout(() => {
            console.log('ovo je iz promisea ' + data.name);
            resolve(data.surname);
        }, 2000);
    })
}

export {person, x}
