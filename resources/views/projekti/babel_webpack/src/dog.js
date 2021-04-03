import { reject } from "lodash"

const me = () => {
    return new Promise( (reslove , reject) => {
        setTimeout(() => {
            console.log('promise');
            reslove('gotovo promise');
        }, 2000);
    })
}

let person = {
    ime : "ime",
    prezime : "prezime"
}

export {me , person}


export default {
    hide() {
        console.log('da');
    }
}
