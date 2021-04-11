
let object = {
    name : "marin",
    surname : "sabljo"
}

const ime = (data) => {
    return new Promise( (resolve , reject) => {
        setTimeout(() => {
            console.log('bravooooooo Bože hvala TI +' + data);
            resolve('odlično');
        }, 2000);
    });
}



export {object , ime}


export default
    function gey(){
        console.log('dadada');
    }

