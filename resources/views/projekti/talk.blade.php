@extends('master.master')

@section('content')


<div class="background">
    <div class="container text-dark" style="border-radius: 1rem;">
        <p class="center-align ">
            <button class="btn-large talk orange darken-4 z-depth-3 pulse waves-efect">Pričaj Z Menom</button>
            <button class="btn-small open  green darken-2 z-depth-1 left ">Show Povijest</button>
            <button class="btn-small closee blue darken-2 z-depth-1 right ">Sakriji Povijest</button>
        </p>
        <div class="answers">
            <div class="mt-5 center ">
            <button class="btn-large orange darken-3 pulse btn-floating"><i class="material-icons" style="font-size: 3rem;">mic</i></button>
                <h2></h2>
            </div>
            <div class="mt-5 ">
                <h3>TI:</h3>
                <div class="content"></div>
            </div>

            <div class="mt-5 ">
                <h3>FREND:</h3>
                <div id="him" class="him"></div>
            </div>

            <div class="mt-5 center">
                <h4>POVIJEST</h4>

                    <table  class="highlight responsive-table grey text-black">
                    <thead>
                        <tr>
                            <th>YOU ASKED</th>
                            <th>ANSWEARS</th>
                        </tr>
                    <tbody id="historyTable">
                        <tr id="history"></tr>
                        <tr id="answers"></tr>
                    </tbody>
                    </thead>
                    </table>
            </div>
        </div>
    </div>
</div>


<style>

.background{
    overflow: hidden;
    height: auto;
    background: linear-gradient( to right top, #99dcc1, #9cabeb);
}

.container{
    margin: 20% auto;
}

.answers{
    display:none;
}

.container , table{
    background: linear-gradient(to left bottom, rgba(255, 255, 255, 0.6) , rgba(255, 255, 255, 0.3));
    backdrop-filter: blur(2rem);
    color: #426696;
    font-weight: 600;
}
</style>





<script>

//VARIJABLE
let btn = document.querySelector('.talk');
let content = document.querySelector('.content');
let content2 = document.getElementById('him');
let answers = document.querySelector('.answers');
let close = document.querySelector('.closee');
let open = document.querySelector('.open');

let greetings = [
    'I amm good, You Sexy Tiger',
    'I am not soo good, cheer me up with your big dick, ask me about your girl',
    'I wont talk to you, fuck off',
    'Doing good my homeboy',
    'I am great You my beautiful peace of love',
    'Why do you ask? Are you a doctor?',
    'It"s a secret, ask me about your girl'
    ];

let grilfriend = [
    'She is soo hot, she has a big juice booty',
    'Dont know, but i do know that she can eat so much chees, i havent seen that before, ever',
    'She is great because she loves you!',
    'She cool, she will give you a blowjob very very soon',
    'She is beautiful, she is bueauty',
    'She is bomb',
    'She is soooo great, because she will make you a pancakes'
    ];

let goodbye = [
    'Fuck off my dear',
    'Fuck off my dear'
    ];


//-------------------------------------------------------------------------------------------


//UPAL UGAS HISTORYA
    open.addEventListener('click' , (e) => {
        e.preventDefault();
        answers.style.display = 'block';
    });


    close.addEventListener('click' , (e) => {
        e.preventDefault();
        answers.style.display = 'none';
    })

//pokreni snimanje zvuka i mogućnost da ti pričaš u mikrofon!
    btn.addEventListener('click' , () => {
        recognition.start();
    })




    //MOGUĆNOST DA TI PRIČAŠ I DA OČITA TVOJU PORUKU
    let SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        //ovo new je zapravo varijabla od gore stavljena kao funkcija
    let recognition = new SpeechRecognition();

    recognition.onstart = function() {
        console.log('voice is activited, speak now!');
        answers.style.display = 'block';
    }

    //event hold string a we talking about - sad imamo dostupno sve što kažemo
    recognition.onresult = function(event) {

        //access to izgovorenu poruku
        let current = event.resultIndex;
        let transcript = event.results[current][0].transcript;
        content.innerHTML = transcript;

        readOutLoud(transcript);
      //  showTable(transcript);
    }

    recognition.onend = function(event) {
        console.log('GOTOVO - imaš 2 sekunde!');

        setTimeout(() => {
            answers.style.display = 'none'; //nije nužno ako relodaš
            location.reload()
        }, 2000);
    }








function readOutLoud(message){

    let speech = new SpeechSynthesisUtterance();

    //PROVJERAVA DA LI U PORUCI IMA NEKA OD RIJEČI IZ CONDITIONSA, AKO DA VRAĆA TRUE!
    var conditions = ['girl', 'how are you', 'bye'];
    var test = conditions.some(el => message.includes(el));


    //AKO NEMA NITI JEDAN OD GORE NAVEDENIH RIJEČI ONDA VRAĆA OVU DEFAULT PORUKU
    if(!test){

        //je ono što će on reći || ili gore što si stavljao u zgradu kod speecSynthesisa Utersua
        speech.text = 'I wont talk about that, it is lame, ask me something about how am i, or something about your girl, or say bye to me';
        speech.rate = 2;

        let answear = {
            "transcript" : message,
            "answear" : speech.text
        }

        if(localStorage.getItem('answears') === null){
            let answears = [];
            answears.push(answear);
            localStorage.setItem('answears' , JSON.stringify(answears));
        }else{
            let answears = JSON.parse(localStorage.getItem('answears'));
            answears.push(answear);
            localStorage.setItem('answears' , JSON.stringify(answears));
    }
    }


    //AKO U PORUCI IMA "HOW ARE YOU"
    if(message.includes('how are you')) {
        //math for randomnes in greetings array
        let final = greetings[Math.floor(Math.random() * greetings.length)];
        speech.text = final;
        content2.innerHTML = speech.text;
        speech.rate = 1;

        let answear = {
            "transcript" : message,
            "answear" : speech.text
        }

        if(localStorage.getItem('answears') === null){
            let answears = [];
            answears.push(answear);
            localStorage.setItem('answears' , JSON.stringify(answears));
        }else{
            let answears = JSON.parse(localStorage.getItem('answears'));
            answears.push(answear);
            localStorage.setItem('answears' , JSON.stringify(answears));
        }
    }


    //AKO U PORUCI IMA "GIRL"
    if(message.includes('girl')) {
         //math for randomnes
        let final = grilfriend[Math.floor(Math.random() * greetings.length)];
        speech.text = final;
        content2.innerHTML = speech.text;
        speech.rate = 1;

        let answear = {
            "transcript" : message,
            "answear" : speech.text
        }

        if(localStorage.getItem('answears') === null){
            let answears = [];
            answears.push(answear);
            localStorage.setItem('answears' , JSON.stringify(answears));
        }else{
            let answears = JSON.parse(localStorage.getItem('answears'));
            answears.push(answear);
            localStorage.setItem('answears' , JSON.stringify(answears));
        }
    }




    //AKO U PORUCI IMA "BYE"
    if(message.includes('bye')) {
         //math for randomnes
        let final = goodbye[Math.floor(Math.random() * greetings.length)];
        speech.text = final;
        content2.innerHTML = speech.text;
        speech.rate = 1;

        let answear = {
            "transcript" : message,
            "answear" : speech.text
        }

        if(localStorage.getItem('answears') === null){
            let answears = [];
            answears.push(answear);
            localStorage.setItem('answears' , JSON.stringify(answears));
        }else{
            let answears = JSON.parse(localStorage.getItem('answears'));
            answears.push(answear);
            localStorage.setItem('answears' , JSON.stringify(answears));
        }
    }


    //da prikaže ono što govori
    content2.innerHTML = speech.text;

    //options
    speech.volume = 1;
    speech.pitch = 1;

    //DA PROPRIČA
    let synt =  window.speechSynthesis;
    synt.speak(speech);
}




//show questions in  table
function showTable(){

    let store = JSON.parse(localStorage.getItem('answears'));
    let out = '';

    store.forEach( (entery) => {
        out+=
        `<tr>
            <td>${entery.transcript}</td>
            <td>${entery.answear}</td>
        </tr>
        `
    });

    document.getElementById('historyTable').innerHTML = out;
}

showTable();

</script>
@endsection
