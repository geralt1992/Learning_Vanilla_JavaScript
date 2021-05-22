export default
    function marin(){
        console.log('dada');
    }



let xxx = (podatak) => {
    return new Promise( (resolve, reject) => {
        setTimeout(() => {
            console.log('evo mene funkcijo, moje ime je ' + podatak.name);
            resolve(podatak.grad);
        }, 2000);
    })
}


let podatak = {
    name : 'marin',
    prezime : 'sabljo',
    grad : 'osijek'
}

export {xxx , podatak}
