@extends('master.master')

@section('content')



<div class="container red lighten-3 text-white text-center mt-5">

    <img src="{{asset('img/speech.png')}}" class="mb-5" alt="">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form>

                <div class="form-group">
                    <textarea name="" id="text-input" class="form-control form-control-lg"></textarea>
                </div>

                <div class="form-group my-4">
                    <label for="rate-value" class="text-white">Rate</label>
                    <div id="rate-value" class="float-right new-badge">1</div>
                    <input type="range" id="rate" min=".5" max="2" value="1" step=".1">
                </div>

                <div class="form-group my-4">
                    <label for="pitch-value" class="text-white">Pitch</label>
                    <div id="pitch-value" class="right new-badge">1</div>
                    <input type="range" id="pitch"  min="0" max="2" value="1" step=".1">
                </div>

                <div class="form-group">
                    <select id="voice-select" class="form-control form-control-lg"></select>
                </div>

                <button id="speakBtn" class="btn teal darken-2">Speak</button>

            </form>
        </div>
    </div>

</div>





<script>

//init Spech Synt API 
let synth = window.speechSynthesis;

let textForm = document.querySelector('form');
let textInput = document.getElementById('text-input');
let voiceSelect = document.getElementById('voice-select');
let rate = document.getElementById('rate');
let rateValue = document.getElementById('rate-value');
let pitch = document.getElementById('pitch');
let pitchValue = document.getElementById('pitch-value');
let body = document.querySelector('body');

//init voices array
let voices = [];


//jedini način za dobiti glasove
if(synth.onvoiceschanged !== undefined) {
    synth.onvoiceschanged = getVoices;
}

//ZA POPUNITI SELECT BOX S GLASOVIMA!
function getVoices(){

    voices = synth.getVoices();
    
    //loop th. voices and create option for eachOne

    voices.forEach( (voice) => {
        //create option element
        let option = document.createElement('option');
        //fill options with voice and language
        option.textContent = voice.name + ' ('+ voice.lang +')';

        //set needed options attr 
<<<<<<< HEAD
        option.setAttribute('data-name' , voice.name);
        option.setAttribute('data-lang' , voice.lang);
=======
        option.setAttribute('data-lang' , voice.lang);
        option.setAttribute('data-name' , voice.name);
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3

        voiceSelect.appendChild(option);
    });
}


getVoices();





//KAD SE ZABAGA KOPIRAJ OVO U CONSOLU:   


//speak

function speak(){

    //chek if speaking
    if(synth.speaking){
        console.error('already speaking!');
        return;
    }

    //if input empty
    if(textInput.value !== ''){

        //add background animation
        body.style.background = ' url("{{asset("img/wave.gif")}}")';
        body.style.backgroundSize = '100% 100%';


        let speakText = new SpeechSynthesisUtterance(textInput.value);

        //speak end - this run when it is done speaking
        speakText.onend = e => {
            console.log('done speaking!');
            body.style.background = 'white';
        }

        //if there is speak error
        speakText.onerror = e => {
            console.error('Not good!');
        }

        //selected voice
        let selectedVoice = voiceSelect.selectedOptions[0].getAttribute('data-name');
        
        //loop thr. voices 
        voices.forEach( (voice) => {
            if(voice.name === selectedVoice){
                speakText.voice = voice;
            }
        });

        //set pitch and rate
        speakText.rate = rate.value;
        speakText.pitch = pitch.value;
        
        //speak!
        synth.speak(speakText);
        
    }else{
        alert('nothing for me to speak!')
    }
};



//event listeners

//form submition - when click button speak, start speak function
textForm.addEventListener('submit' , (e) => {
    e.preventDefault();
    speak();
    textInput.blur();
})

//rate and pitch change - 'change' reagira čim promijeniš položaj slidera! - OVO TI JE SAMO ZA PRIKAZ VALUA NA EKRANU
rate.addEventListener('change' , (e) => rateValue.textContent = rate.value);
pitch.addEventListener('change' , (e) => pitchValue.textContent = pitch.value);

//voice select change
voiceSelect.addEventListener('change' , (e) => speak() );








class Uty {

    static bigger(){
        let labels = document.getElementsByTagName('label');
        for(let i = 0; i < labels.length; i++){
            labels[i].classList.add('big');
        }
    }
}

document.addEventListener('DOMContentLoaded' , (e) => {
    Uty.bigger();
});

</script>



<style>

.big{
    font-size: 20px;
}

</style>

@endsection