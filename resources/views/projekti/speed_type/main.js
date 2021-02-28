//probaj naći neki random word api gen

window.addEventListener('load' , init);

//available levels
const levels = {
    easy : 5,
    medium : 3,
    hard : 2
}

//default diff! - easy
let currentLevel = levels.easy;


//user težina

let selectDiff = document.querySelector('#težina');

selectDiff.addEventListener('input' , (e) => {

    e.preventDefault();
    let diff = e.target.value;

    if(diff === 'hard'){
        console.log('stisni si hard');
        currentLevel = levels.hard;
        //show number of sec depends of level
        seconds.innerHTML = currentLevel;

    }else if(diff === 'medium'){
        console.log('stisni si medium');
        currentLevel = levels.medium;
        seconds.innerHTML = currentLevel;

    }else{
        console.log('stisni si easy');
        currentLevel = levels.easy;
        seconds.innerHTML = currentLevel;

    }
})

//globalne varijable
let time = currentLevel;
let score = 0;
let isPlaying = true; //represents if game is on - when game over this shuold be set to false

const wordInput = document.querySelector('#word-input');
const currentWord = document.querySelector('#current-word');
const scoreDisplay = document.querySelector('#score');
const timeDisplay = document.querySelector('#time');
const message = document.querySelector('#message');
const seconds = document.querySelector('#seconds');

const words = [
    'kuća',
    'posao',
    'birtija'
];

//initialize game, when widnow objc is loaded
function init(){

    //show h score from localStorage
    let show_the_score_from_localS = document.getElementById('hScore');
    show_the_score_from_localS.innerHTML = localStorage.getItem('score');

    //function for load word frow array
    showWord(words);
    //start matching on word input
    wordInput.addEventListener('input' , startMatch);
    //call countdown every seconds - zovi tu funkciju svake sekunde
    setInterval(countdown, 1000);
    //check status of the game (is still being play)
    setInterval(checkStatus, 50);
}

//start match
function startMatch(){
    if(matchWords()){
        isPlaying = true;
        time = currentLevel + 1;
        showWord(words);
        wordInput.value = '';

        //double and triple points depends of diff level
        if(currentLevel === 2){
            console.log('HARD');
            score = score + 3;
            scoreDisplay.innerHTML = score;
        }else if(currentLevel === 3){
            console.log('MEDIUM');
            score = score + 2;
            scoreDisplay.innerHTML = score;
        }else{
            console.log('EASY');
            score ++
            scoreDisplay.innerHTML = score;
        }

    }
    //if score is -1 display 0
    if(score === -1){
        scoreDisplay.innerHTML = 0;
    }else{
        scoreDisplay.innerHTML = score;
    }
}

//match current word to wordInput
function matchWords(){
    if(wordInput.value === currentWord.innerHTML){
        mess('Correct' , 'success');
        return true;
    }else{
        mess('Not Correct' , 'warning');
        return false;
    }
}


//pick & show random word
function showWord(words){
    //random words from array over index -floor zaokruzi, random da radnom num a množi se s brojem riječi u word arrayu
    const radnIndex = Math.floor(Math.random() * words.length);

    //output random word
    currentWord.innerHTML = words[radnIndex];
}

//countdown timer
function countdown(){
    //make sure time is not run out
    if(time > 0){
        //decrement time
        time--;
    }else if(time === 0){
        //game is over
        isPlaying = false;
    }
    //show time
    timeDisplay.innerHTML = time;
}

//checking status of the game
function checkStatus(){
    if(!isPlaying && time === 0){
        mess('GAME OVER' , 'danger')

        let store = localStorage;
        let nScore = score;
        let show_hScore = document.getElementById('hScore');

            if(store.getItem('score') === null){
                store.setItem('score' , nScore);
                show_hScore.innerHTML = nScore;
            }else{
                let temp_high_score =  store.getItem('score');
                if( temp_high_score < nScore){
                    store.setItem('score' , nScore);
                    show_hScore.innerHTML = nScore;
                }
            }

        score = -1; //jel kad izgubiš imaš vremena beskonačno za prvu riječ, pa da bude fer staviš na -1
    }
}


function mess(message , color){
    let m = document.querySelector('#message');
    m.classList.remove('alert' , 'alert-danger' , 'alert-warning' , 'alert-success');
    m.classList.add('alert' , `alert-${color}`);
    m.innerHTML = message;
}


const randowWord = require('./node_modules/random-word');


