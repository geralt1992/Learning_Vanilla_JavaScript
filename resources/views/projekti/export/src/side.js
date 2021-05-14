export default
    function marin() {
        console.log('da');
    }



let obj = {
    name : 'marin',
    surname : 'sabljo',
    city : 'osijek'
}


let pr = (data) => {
    return new Promise( (resolve, reject) => {
        setTimeout(() => {
            console.log('iz funkcije');
            resolve(data.city);
        }, 2000);
    })
}



export {obj , pr}
