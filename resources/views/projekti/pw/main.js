
//DOM Elements
const resultEl = document.getElementById('result');
const lengthEhl = document.getElementById('length');
const uppercaseEl = document.getElementById('uppercase');
const lowercaseEl = document.getElementById('lowercase');
const numbersEl = document.getElementById('numbers');
const symbolsEl = document.getElementById('symbols');
const generateEl = document.getElementById('generate');
const clipboardEl = document.getElementById('clipboard');




const randoFunc = {
    lower : getRandowLower,
    upper : getRandowUpper,
    number : getRandowNumber,
    symbol : getRandowSymbol
};


//events
generateEl.addEventListener('click' , () => {
    const length = +lengthEhl.value;
    // + je za pretvoriti string u number

    const hasLower = lowercaseEl.checked;
    const hasUpper = uppercaseEl.checked;
    const hasNumber = numbersEl.checked;
    const hasSymbol = symbolsEl.checked;

    resultEl.innerText = generatePassword(hasLower, hasUpper, hasNumber, hasSymbol, length);
});

//copy pw to clipboard

clipboardEl.addEventListener('click' , (e) => {
    e.preventDefault();
    const textarea = document.createElement('textarea');
    const password = resultEl.innerText;

    if(!password){
        return;
    }

    textarea.value = password;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy'); //izvršava naredbu kopiranja!
    textarea.remove();
    alert('pw is copied to clipboard');



});

// generate pw function
function generatePassword(lower, upper, number, symbol, length){
    //init pw variable - string upon you ll build on
    //filter out unchecked types
    //loop over length call generator function as many times as is it length
    //add final pw to the pw var and return it

    let generatedPassword = '';
    const typesCount = lower + upper + number + symbol;

    //wrap into {} to becom object with key lower : true etc...
    //object.value uzima item i first values which is 0 if it is false it will go out
    const typesArray = [{lower}, {upper}, {number}, {symbol}].filter( (item) => Object.values(item)[0]);

    //if nothing is checked
    if(typesCount === 0){
        return '';
    }

    for(let i = 0; i < length; i += typesCount){
        typesArray.forEach( (type) => {
            const funcName = Object.keys(type)[0];
            generatedPassword += randoFunc[funcName]();
        });
    }

    const finalPassword = generatedPassword.slice(0 , length);
    return finalPassword;
}





//generator functions
function getRandowLower() {
    return String.fromCharCode( Math.floor(Math.random() * 26) + 97);
}

function getRandowUpper() {
    return String.fromCharCode( Math.floor(Math.random() * 26) + 65);
}

function getRandowNumber() {
    return String.fromCharCode( Math.floor(Math.random() * 10) + 48);
}

function getRandowSymbol() {
    const symbols = '!@#$%/[]{}'
    return symbols[Math.floor(Math.random() * symbols.length)];
}



document.getElementById('proba').addEventListener('click' , (e) => {
    e.preventDefault();

    let url = 'http://localhost/fun/public/probbba';

    let xhr = new XMLHttpRequest();

    xhr.open('GET' , url , true);
    xhr.onload = function(){
        if(xhr.status === 200){
            let parsed = JSON.parse(xhr.responseText);
            console.log(parsed);
        }else{
            console.log('not found');
        }
    }
    xhr.send();

})

