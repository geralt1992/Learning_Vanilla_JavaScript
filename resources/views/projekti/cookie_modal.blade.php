@extends('master.master')

@section('content')



<div class="container">

<button id="extraOpen" class="center btn-large orange">Open</button> 

<div id="modall" class="modall">

    <div id="modalContent" class="modalContent">
        <span  class="closeBtn">&times;</span>
        <p id="modalText" class="center">Ovo su naši uvjeti korištenja, da li se slažeš s njima, ako ne molim te napusti stranicu! Hvala! 
    <br>
        <a href="https://www.24sata.hr/" target ="_blank">Uvjeti</a></p>
        <hr>
        <button class="btn-small waves-effect green lighten-1 left pulse" id="accept">Prihvaćam uvjete korištenja</button>
        <button class="btn-small waves-effect red darken-1 right" id="decline">Ne prihvaćam uvjete korištenja</button>
    </div>

</div>


</div>


<script>

let openBtn = document.getElementById('extraOpen');
let closeBtn = document.getElementsByClassName('closeBtn')[0];
let modalWindow = document.getElementById('modall');
let modalBox = document.querySelector('#modalContent');
let acceptBtn = document.getElementById('accept');
let declineBtn = document.querySelector('#decline');


let store = localStorage;

document.addEventListener('DOMContentLoaded' , (e) => {
    if(store.getItem('conditions') != null){
        modalWindow.style.display = 'none';
    }
});


acceptBtn.addEventListener('click' , (e) => {
    let conditions = 'accepted';
    store.setItem('conditions' , JSON.stringify(conditions));
    modalWindow.style.display = "none";

    //SPEAK IN
    let synth = window.speechSynthesis;
    let speakText = new SpeechSynthesisUtterance("You accepted terms, thank you");
    synth.speak(speakText);
});

openBtn.addEventListener('click' , openMe);

function openMe(e){
    e.preventDefault();
    modalWindow.style.display = '';

    //SPEAK IN
    let synth = window.speechSynthesis;
    let speakText = new SpeechSynthesisUtterance("I am open!");
    synth.speak(speakText);
}

closeBtn.addEventListener('click' , (e) => {
    e.preventDefault();
    modalWindow.style.display = 'none';

     //SPEAK IN
    let synth = window.speechSynthesis;
    let speakText = new SpeechSynthesisUtterance("You closed me");
    speakText.rate = 2;
    speakText.volume = .5;
    speakText.pitch = 2;
    synth.speak(speakText);

});

declineBtn.addEventListener('click' , (e) => {
    //SPEAK IN
    let synth = window.speechSynthesis;
    let speakText = new SpeechSynthesisUtterance("You decline terms");
    synth.speak(speakText);

    window.location.replace("https://www.google.com/");
})


document.addEventListener( 'click' , (e) => {
    if(e.target == modalWindow){
        modalWindow.style.display = 'none';
    }
});
</script>




<style>

.modall{
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(0 , 0, 0, 0.5);
    overflow: hidden;
    width: 100%;
    height: 100%;
}

.modalContent{
    position: relative;
    margin: 15% auto;
    width: 60%;
    background: white;
    padding: 3rem;
    background-color:#f4f4f4f4;
    box-shadow: 0 5px 8px 0 rgba(0 , 0 , 0, 0.2) , 0 7px 20px 0 rgba(0 , 0 , 0, 0.17);
    border-radius: 1%;
}

.closeBtn{
    cursor: pointer;
    font-size: 2rem;
    float: right;
    color: red;
}

#modalText{
    padding: 20px;
    font-size: 18px;
    line-height: 30px;
}


</style>
@endsection