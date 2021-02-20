@extends('master.master')
@section('content')


<!-- LEKCIJE-->

    <!-- JSON CONVERT-->
    <!-- HIGH ORDER FUNCTION (FOREACH, MAP, FILTER) -->
    <!-- OBJEKTI I KLASE-->
    <!-- QUERY SELEKTORI-->
    <!-- EVENTI-->
    <!-- LOCAL STORAGE-->




<header id="nesto">
    <h1>JS For Beginners</h1>
    </header>

    <section class="container">
      <form id="my-form">
        <h1>Add User</h1>
        <div class="msg"></div>
        <div>
          <label for="name">Name:</label>
          <input type="text" id="name">
        </div>
        <div>
          <select name=""  class="form-control" id="select">
          
            <option value="1"> 1</option>
            <option value="2"> 2</option>
            <option value="3"> 3</option>
          
          </select>
        </div>
        <input class="btn" id="tako" type="submit" value="Submit">
      </form>

      <ul id="users"></ul>

      <ul class="items">
        <li class="item">Item 1</li>
        <li class="item">Item 2</li>
        <li class="item">Item 3</li>
      </ul> 

      <br><br><br>

      <button class="btn-danger btn" id="button">Klikni me</button>
      <br>
      <button class="btn-success btn" id="button2">Klikni me2</button>
        <br><br>


      <div id="box" style="width:400px; height:200px; background: #f4f4f4;"></div>
    </section>



<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- JSON CONVER - json je za slanje podataka na server!!! -->
<script>

const todos = [
{
    id : 1,
    text : "marin",
    old : 13,
    isCompleted : true
},

{
    id : 2,
    text : "maarin",
    old : 13,
    isCompleted : false
},

{
    id : 3,
    text : "marrin",
    old : 13,
    isCompleted : true
}

]

console.log(todos);

let iz_javascripta_u_json = JSON.stringify(todos);

// let iz_jsona_za_javascript = JSON.parse(todos);



// HIGH ORDER FUNCTION - forEach, map, filter

    //forEach
todos.forEach(function(todo) {
    console.log(todo.id);
})

    //map - vraća array
const todoText = todos.map(function(todo) {
    return todo.text;
})
    console.log(todoText);


    //filter - još provjeri
const todoCompleted = todos.filter(function(todo){
    return todo.isCompleted === true;
})
    console.log(todoCompleted);

</script>





<!-- OBJEKTI I KLASE-->


<script>
//constructro function - kad je klasa mora početi s velikim početnim slovom
function Person (fname, lname, dob){

    this.fname = fname;
    this.lname = lname;
    this.dob =  dob;
            //templets literals ovo s ` `
    this.fullName = function () {
        return `moje puno ime je ${this.fname} ${this.lname}`
    }

}

//prototype u klasama - da ne ponavljas sve kad ti treba dio da si izdvojis - kad pozoves obj pisat ce ti funkcija u protoype kategorij to
Person.prototype.ime = function() {
        return this.fname;
}

//instation object
const person1 = new Person('marin' , 'sabljo' , 26);

console.log(person1.ime());
console.log(person1.fullName());

</script>







<!-- selectori---------------------------------------------------------------------------------------------------------------------------------------->

<script>

//querySelecotr() - uzima samo prvi item - mozes mu unjeti sto god hoces, id, tag, class...
let single = document.querySelector('h1'); 

console.log(single)

//querySelectorAll() - uzima sve h1
let all = document.querySelectorAll('h1');

console.log(all)


// KORSINO - innerHTML vs textContent ||firstElementChild, last..., children[]
const ul = document.querySelector('.items');
    // ul.remove(); - miće iteme
    // ul.lastElementChild.remove(); // miće zadnji child
    ul.firstElementChild.innerHTML = "<h2>Iner html daje mogućnost pisanja cijelog htmla</h2>" //utječe na prvi child
    ul.children[1].textContent = "mjenjo si me" //za naći bilo koji child s indexom + nešto kao innherHTML
     

//eventi - evlistn(event, function koju hoćeš)
//kad korisiš event stavis ono "e" u arrow function to znaci da koristis event
//"e" je event peramitor
//.preventDefault() - bitno na submit kliku, da mu kazes da je jendom dovoljno

 
const btn = document.querySelector('#tako');

btn.addEventListener('click', (e) => {
    e.preventDefault();
    console.log("click");
})


// setTimeout(() => nešto.remove(), 3000); // setTimoute(ime funkcije, vrijeme)
// pomoću nje napravis da se nešto makne s ekrana nakon vremena kojeg ti zelis jebeno! 


//parentNode i parentElement - vraća roditelja!
const sm = document.querySelector('#my-form');
let parent = sm.parentNode;
console.log(parent);


// childNodes - vraća dijete s whitespacim u polju  || children - vraća samo dijete
console.log(sm.childNodes);
console.log(sm.children);
console.log(sm.children[2]);

//firstElementChild || lastElementChild- vraća prvo/zadnje dijete
console.log(sm.firstElementChild);
console.log(sm.lastElementChild);


//nextElementSibling || previousElementSibling- vraća prvog/slijedećeg idućeg u hijerarhiji
console.log(sm.nextElementSibling); 
console.log(sm.previousElementSibling)


//className - dodaj klasu
let neew = document.createElement('div');
neew.className = "hello"; 
neew.textContent = "ćao bao";

//setAttribute - dodaj atribut u element FORA
neew.setAttribute('ime' , 'marin');

console.log(neew);

//insertBefore(što , gdje)

let prijeČega = document.querySelector('header h1');
let gdje = document.querySelector('header');

gdje.insertBefore( neew , prijeČega);



</script>


<!-- EVENT---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


<script>

//e = event parametar 
let button = document.getElementById('button');
button.addEventListener('click' , (e) => {

    console.log(e.target.id); //target je mjesto odakle je pokrenut event
    console.log('moze');

//provjerava da li user drzi neku od tipki alt, ctrl, shift - za kombanje
    console.log(e.altKey);
    console.log(e.ctrlKey);
    console.log(e.shiftKey);


    if(e.shiftKey === true){
   alert('drzis shift, bravo');
    }   
})


//eventi mouse 
let button2 = document.querySelector('#button2');
let box = document.querySelector('#box');
let select = document.querySelector('select');


// 1 - kad udjes na područje diva mjenja se
box.addEventListener('mouseenter', runEvent);
box.addEventListener('mouseleave', runEvent);

box.addEventListener('mouseover', runEvent); //- BZVZ
box.addEventListener('mouseout', runEvent); // - BZVZ


//2 - kad klinkes - isto sranje ko "click"
button2.addEventListener('mousedown' , runEvent); - // BZVZ
// button2.addEventListener('mouseup' , runEvent); - BZVZ


//3 - kad god mices misa puca event, dobra stvar kombat s polozajem miša tipa e.offsetX||Y >||< od nečeg
box.addEventListener('mousemove', runEvent);


//4. - svaki put kad promijeniš izbor slecta klikom, on se aktivira
select.addEventListener('change', runEvent); 


function runEvent(e){
    e.preventDefault()
    
    console.log('event type ' + e.type);
    document.body.style.backgroundColor = "rgb(" +e.offsetY+" , "+e.offsetX+" , " +e.offsetX+")";
}





//eventi keyboard

let iteminput = document.querySelector('input[type = "text"]');
let form = document.querySelector('form');

// iteminput.addEventListener('keydown' , runSecondEvent); - odlično za search box automatski čim tipkaš

// iteminput.addEventListener('focus' , runSecondEvent); // kad kliknes - BZVZ
// iteminput.addEventListener('blur' , runSecondEvent); // kad izadjes s klikom dalje - BZVZ

// iteminput.addEventListener('input' , runSecondEvent); // čim nešto radiš s inputom aktivira se - BZVZ

iteminput.addEventListener('cut' , runSecondEvent); // kad izrezes nesto sto si napisao u inputu
iteminput.addEventListener('paste' , runSecondEvent); // kad zaljepis nesto u input - tipa ako kopiras pw da ti ne da

function runSecondEvent(e){
    
//console.log(e.target.value); //prikazuje ono sto pises

if(e.type == 'cut'){
    alert('ovo si isjekao');
}else{
    alert('nemoj kopirati stvari, refrešaj stranicu s f5');
    iteminput.value = "Provjeri lozinku, a ne kopiraj! ";
}
}

//kad klinkeš submit što će se desit - uvijek uz e.preventDefault()
form.addEventListener('submit' , runSecondEvent);


</script>



<!-- LOCAL STORAGE---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<script>

//za kruzenje kroz store
let store = localStorage; 

for(i = 0; i < store.length; i++){

    let key = store.key(i);
    let item = store.getItem(key);
    let parsed = JSON.parse(item);

}

//methods 

localStorage.removeItem('key');
localStorage.getItem('key');
localStorage.setItem('key' , 'value'); //sprema sve kao string - JSON.stringify();

</script>




<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

@endsection