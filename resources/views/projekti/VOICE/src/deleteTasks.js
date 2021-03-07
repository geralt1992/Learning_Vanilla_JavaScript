//KONSTANTE
const ttableOut = document.getElementById('out');




//FUNKCIJA ZA BRISANJE
function deleteTask(transcript){

    let store = localStorage;

    //PROVJERAVA DA LI U PORUCI IMA NEKA OD RIJEČI IZ CONDITIONSA, AKO DA VRAĆA TRUE!
    var conditions = ['one' , 1 , 'two' , 2 , 'three' , 3 , 'four' , 4 , 'five' , 5 , 'six' , 6 , 'seven' , 7 , 'eight' , 8 , 'nine' , 9 , 'ten' , 10 ];
    var test = conditions.some(el => transcript.includes(el));




    //prikazuje broj taskova (tr) u table bodyu
    let currentTasksLenght = ttableOut.querySelectorAll('tr').length;
/*
    if(!test){
        //maknuti iz lStorea - MIČE ZADNJI UNOS
        let tasks = JSON.parse(store.getItem('tasks'));
        //ODLIČNA STVAR ZA MICATI ZADNJI ITEM IZ POLJA
        tasks.splice(currentTasksLenght - 1 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }
*/




    //maknuti iz lStorea - miče prvi unos
    if(transcript.includes('one') ||transcript.includes(1)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(0 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

    //maknuti iz lStorea - miče drugi unos
    if(transcript.includes('two') ||transcript.includes(2)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(1 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

     //maknuti iz lStorea - miče teći unos
    if(transcript.includes('three') ||transcript.includes(3)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(2 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

     //maknuti iz lStorea - miče četvrti unos
    if(transcript.includes('four') ||transcript.includes(4)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(3 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

    //maknuti iz lStorea - miče peti unos
    if(transcript.includes('five') ||transcript.includes(5)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(4 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

    //maknuti iz lStorea - miče šesti unos
    if(transcript.includes('six') ||transcript.includes(6)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(5 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

    //maknuti iz lStorea - miče sedmi unos
    if(transcript.includes('seven') ||transcript.includes(7)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(6 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

    //maknuti iz lStorea - miče osmi unos
    if(transcript.includes('eight') ||transcript.includes(8)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(7 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

     //maknuti iz lStorea - miče deveti unos
    if(transcript.includes('nine') ||transcript.includes(9)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(8 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }

    //maknuti iz lStorea - miče deseti unos
    if(transcript.includes('ten') ||transcript.includes(10)){
        let tasks = JSON.parse(store.getItem('tasks'));
        tasks.splice(9 , 1);
        store.setItem('tasks' , JSON.stringify(tasks));
    }
}


export {deleteTask};
