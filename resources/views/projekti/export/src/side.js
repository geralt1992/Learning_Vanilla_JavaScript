export default
    function marin(){
        alert('me');
    }

let obj = {
    name: 'marin',
    surname: 'nina'
}


const pro = (data) => {
    return new Promise( (resolve, reject) => {
        setTimeout(() => {
            console.log('ovo je iz promisea, meni se vratila i Bože hvala Ti ' + data.surname);
            resolve(data.name)
        }, 2000);
    })
}


export {obj, pro}
