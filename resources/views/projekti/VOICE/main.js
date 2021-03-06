M.AutoInit();

//modal mater
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
});

//tooltp mater
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
});

//you say it dio // done jobs dio
////////////////////////////////////////////////////////////////////////////////////////


const addBtn = document.getElementById('addTask');
const tableOut = document.getElementById('out');

//mogućnost da ti prikaže transcript tvog razgovora
let SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
//ovo new je zapravo varijabla od gore stavljena kao funkcija
let recognition = new SpeechRecognition();



//startaj sve!
addBtn.addEventListener('click' , (e) => {
    e.preventDefault();
    //voice message
    voiceMessage();
    recognition.start();
})



recognition.onstart = function() {
    console.log('voice is activited, speak now!');
}

 //event hold string a we talking about - sad imamo dostupno sve što kažemo
recognition.onresult = function(event) {

    //access to izgovorenu poruku
    let current = event.resultIndex;
    let transcript = event.results[current][0].transcript;

    //filter control word
    controlWord(transcript);

}

recognition.onend = function(event) {
    console.log('GOTOVO');
  //  location.reload();
}






//FUNKCIJA ZA FLITERAT KONTROLNU RIJEČ (ADD OR DELETE)

function controlWord(transcript){
    console.log(transcript);

     //PROVJERAVA DA LI U PORUCI IMA NEKA OD RIJEČI IZ CONDITIONSA, AKO DA VRAĆA TRUE!
        var conditions = ['save', 'remove'];
        var test = conditions.some(el => transcript.includes(el));

    //ako nema kontrolne riječi
    if(!test){
        alert("If you wann save your task, at begin say word 'SAVE' , OR , if you wann delete last task, just say word 'REMOVE'");
    }

    //za dodavanje
    if(transcript.includes('save')){
        //save to lStore
        //SKONTAJ KAKO MAKNUTI OVAJ SAVE IZ STRINGA - REGEX SKONTAJ
        str = transcript.replace("data-", "");

        saveToStore(transcript);
      //  location.reload();
    }

    //za brisanje
    if(transcript.includes('remove')){
        deleteTask(transcript);

    }


}


//FUNKCIJA ZA VOICE MESSAGEOM
function voiceMessage(){

    let speech = new SpeechSynthesisUtterance();
    speech.text = "You can say your task now";

    let synt =  window.speechSynthesis;
    synt.speak(speech);
}


//FUNKCIJA ZA SPREMITI TRANSCRIPT U LOCAL STORAGE
function saveToStore(transcript){

    let store = localStorage;

    let checkLength = JSON.parse(store.getItem('tasks'));

    //provjerava da li je spremljeno 10 taskova, ako da ne da dalje spremanje
    if(checkLength.length <= 9){
        let task = {
            task : transcript
        }

        if(store.getItem('tasks') === null){
            let tasks = [];
            tasks.push(task);
            store.setItem('tasks' , JSON.stringify(tasks));
        }else{
            let tasks = JSON.parse(store.getItem('tasks'));
            tasks.push(task);
            store.setItem('tasks' , JSON.stringify(tasks));
        }

    }else{
        alert('Maximum number of Tasks is already saved, try to solve some of them and then come with new one!');
        return false;
    }
}


//FUNKCIJA ZA NAPRAVITI NEW TABLE ROW I PRIKAZATI TASK
function showTaskOutput(){
    let store = localStorage;
    let tasks = JSON.parse(store.getItem('tasks'));
    let out = '';
    let i = 1;

    tasks.forEach( (task) => {

        let row = document.createElement('tr');
        row.innerHTML = `
            <td>${i}</td>
            <td>${task.task}</td>
            <td>ADD</td>
        `
        tableOut.appendChild(row);
        i++;
    });
}


//show it from lStore to html
showTaskOutput();


//FUNKCIJA ZA BRISANJE -- ograničiti na 10 unosa zadataka, i profiltirati brojeve
function deleteTask(transcript){

    //prikazuje broj taskova (tr) u table bodyu
    let currentTasksLenght = tableOut.querySelectorAll('tr').length;
    let store = localStorage;

    //PROVJERAVA DA LI U PORUCI IMA NEKA OD RIJEČI IZ CONDITIONSA, AKO DA VRAĆA TRUE!
    var conditions = ['one' , 1 , 'two' , 2 , 'three' , 3 , 'four' , 4 , 'five' , 5 , 'six' , 6 , 'seven' , 7 , 'eight' , 8 , 'nine' , 9 , 'ten' , 10 ];
    var test = conditions.some(el => transcript.includes(el));


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
