
export default {
    marin(){
        alert('dadaad');
    }
}



const pro = () => {
    return new Promise( (resolve, reject) => {
        setTimeout(() => {
            console.log('iz promisa');
            resolve('BRAVO, HVALA TI BOŽE!');
        }, 2000);
    });
}

function gey(){
    alert('gey');
}



let obj = {

    name : "marin",
    surname : "sabljo"
}
export {pro , gey, obj}
