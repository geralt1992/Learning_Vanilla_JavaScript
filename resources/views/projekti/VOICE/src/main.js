import './modal.js'; //materialize css
import './doneTask.js';
import {deleteTask} from './deleteTasks.js';

const addBtn = document.getElementById('addTask');
const tableOut = document.getElementById('out');
const youSaidOutput = document.getElementById('youSaid');
const modalOkBtn1 = document.getElementById('modalOk1');
const modalOkBtn2 = document.getElementById('modalOk2');





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

    //show what user said
    youSaidOutput.innerHTML = transcript;

    //filter control word
    controlWord(transcript);

}

recognition.onend = function(event) {
    console.log('GOTOVO');
}






//FUNKCIJA ZA FLITERAT KONTROLNU RIJEČ (ADD OR DELETE)

function controlWord(transcript){
    console.log(transcript);

     //PROVJERAVA DA LI U PORUCI IMA NEKA OD RIJEČI IZ CONDITIONSA, AKO DA VRAĆA TRUE!
        var conditions = ['save', 'remove'];
        var test = conditions.some(el => transcript.includes(el));

    //ako nema kontrolne riječi
    if(!test){
        alert(`You Said: "${transcript}" --- at the end use command words (SAVE, REMOVE)`);
    }

    //za dodavanje
    if(transcript.includes('save')){
        //save to lStore
        //SKONTAJ KAKO MAKNUTI OVAJ SAVE IZ STRINGA - REGEX SKONTAJ
        let str = transcript.replace("data-", "");

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

    let check = JSON.parse(store.getItem('tasks'))

    //provjerava da li je spremljeno 10 taskova, ako da ne da dalje spremanje - provjera je li lStorage prazan
    if(check === null || check.length <= 9){

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
    }
    else{
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
            <td class="lime lighten-3 center" style="font-weight: 600">UNDONE</td>
        `
        tableOut.appendChild(row);
        i++;
    });
}


//show it from lStore to html
showTaskOutput();



//FUNKCIJA PRIKAŽI/SAKRIJI DONE TASKS
function toogleDoneTasks(){
    const content = document.getElementById('content');
    const showHideBtn =document.getElementById('showHideBtn');

    showHideBtn.addEventListener('click' , (e) => {
        e.preventDefault();

        if(showHideBtn.innerText === 'PRIKAŽI'){
            content.style.display = 'block';
            showHideBtn.innerText = 'SAKRIJI';
        }else{
            content.style.display = 'none';
            showHideBtn.innerText = 'PRIKAŽI';
        }
    });

}

toogleDoneTasks();


//FUNKCIJA ZA MODAL OK BTN reload page
modalOkBtn1.addEventListener('click' , () => {
    location.reload();
});

modalOkBtn2.addEventListener('click' , () => {
    location.reload();
});
