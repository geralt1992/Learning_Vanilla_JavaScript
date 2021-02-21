@extends('master.master')
@section('content')



<!-- LEKCIJE-->
  <!-- 1 DOOM MANIUPLATION-->
  <!-- 2 DOM CREATION IN JS-->
  <!-- 3 REGEX-->
  <!-- 4 FADE_IN-FADE_OUT-->
  <!-- 5 FORM VALIDATION-->
  <!-- 6 TIMING(INTERVALI)-->






<!-- input from users-->
<input type="text" name="" id="text1" placeholder="Enter nešto">
<br>
<button onclick="fn1()" id="btn1">Diraj me</button>

<!-- DOM MANIPULATION-->
<br><br>
<button   onclick ="btnClick()" >Clik me</button>
<h2 id="heading2">Random text</h2>

<br><br>
<button onclick="skriveno()">Bravo</button>

<br><br>
<button onclick="makni()">makni</button>

<!-- class MANIPULATION-->
<br><br>
<div id="nesto">
<p class="nema">Ovo je odlomak</p>
<p class="para">Ovo je odlomak</p>
<p class="para">Ovo je odlomak</p>
</div>
<br>
<button onclick="changeStyle()">Diraj me</button>

<!-- input extract-->
<br><br>
<input id="rd1" name="1" type="radio" value="larin izbor">Lara </input>
<br>
<input id="rd2" name="1" type="radio" value="netflixov dark">Dark</input>
<br>
<button id="btn1" onclick ="fn2()">Klik</button>

<!-- select extract-->
<br><br>
<select name="s1" id="se1">
  <option value="Barcelona">Barcelona</option>
  <option value="Real">Real</option>
  <option value="Dinamo">Dinamo</option>
</select>
<br>
<button onclick="fn3()">Pipni me!</button>
<br>
<div id="dodaj" >ovdje ispod</div>


<!-- FORM VALIDATE-->
<br><br>
<form onsubmit="return validate()" action="ako onsubmit vrati false, ne zove iduću stranicu">
<input type="text" id="uname" placeholder="usern">
<br>
<input type="password" id="pword" placeholder="pass">
<br>
<button type="submit">Submit</button>
</form>


<!-- REG EXPRES PROVJERA-->
<br><br>
<form  action="#">
<input type="text" id="username" placeholder="username">
<br>
<label id="my_lab" for="username" style="color:red; visibility:hidden">LOŠE USERNAME</label>
<br>
<button type="button" onclick="regex_check()">Submit</button>
</form>




<!--TIMING IN JS-->
<br><br>
<button id="btnAdd" onclick="start()">Start</button>
<br>
<h2 id="op" >Di si šta ima!?</h2>
<br>
<button type="btnStop" onclick="stop()">Stop</button>


<!--FADE IN/OUT  JS-->
<br><br>
<button id="btnAAdd" onclick="fadeout()">Fade out</button>
<br>
<h1 id="sakri" >Sakriji me polako hahah</h1>
<br>
<button id="btnSStop" onclick=" fadeIn()">Fade in</button>


<!--ZOOM IN/OUT  JS-->
<br><br>
<button id="zoomaj" onmouseover="increse()"  onmouseout="decrese()" style="width:500;" >ZOOOOOM</button>


<!---------------------------------------------------------------------------------------------------->

<!--ZOOM IN/OUT  JS--> NEŠTO NE VALJA
<script>


let width = 100;
let differance = 2; 
let IntervalIII = 0;

document.getElementById('zoomaj').style.width=width;


function increse(){

  IntervalIII =setInterval(zoomIn(), 50);
}

function zoomIn(){
  
  if(width<200){
    width = width + differance;
    document.getElementById('zoomaj').style.width=width;
  }else{

    clearInterval(IntervalIII);

  }
}




</script>






<!--FADE IN/OUT  JS-->

<script>

let opacity = 0;
let intervalID = 0;
let intervalID2 = 0;


function fadeIn(){
  intervalID2 = setInterval(show, 50);
}

function show(){
  let nestani = document.getElementById('sakri');
  opacity = Number(window.getComputedStyle(nestani).getPropertyValue("opacity"));
 
  if(opacity<1){
    opacity = opacity + .1;
    nestani.style.opacity=opacity;
  }else{
    clearInterval(intervalID2);
  }
}






function fadeout(){
  intervalID = setInterval(hide, 50);
}


function hide(){
  let nestani = document.getElementById('sakri');
  opacity = Number(window.getComputedStyle(nestani).getPropertyValue("opacity"));

  if(opacity>0){
    opacity = opacity - .1;
    nestani.style.opacity=opacity;
  }else{
    clearInterval(intervalID);
  }
}

</script>





<!--TIMING IN JS-->

<script>
 /* FOR ONCE TO DO!
let ID = 0; //treba nam da spremimo tajmer, da znamo sto zaustaviti

function printMsg(){

  document.getElementById("op").innerHTML="5 sec passed";
}

function start(){
 ID = window.setTimeout(printMsg, 3000);
}

function stop(){
  window.clearTimeout(ID)
}
*/

//REPEDETLY
let ID = 0; //treba nam da spremimo tajmer, da znamo sto zaustaviti
let seconds = 0;
function printMsg(){

  document.getElementById("op").innerHTML= seconds + " seconds";
  seconds++;
}

function start(){
 ID = window.setInterval(printMsg, 1000);
}

function stop(){
  window.clearInterval(ID)
}
</script>











<!-- REG EXPRES PROVJERA-->

<script>
function regex_check(){
  let username = document.getElementById('username').value;
//reg ex - što treba
  let regx = /[a-x]E[0-9]0/i; //OVO i radi da uvjet ne bude caseinsesitive, tj. da mu je svejedno jesu li mala ili velika slova, [] char set koji je dopušten u tim zagradam
//reg ex - isključivanje
  // let regx =  /[^0-5]abc/; ovo je znak za isključi ^, iskljčio si range od 0 do 5 - to vrijedi samo ako je unutar []
  //ako je vani ^, onda to označava početak npr. /^[5-9]\d{9}$/ znači: na prvoj poziciji mora biti broj od 5 do 9, i iza njega mora ici 9 digitsa (znamenaka), $ označava kraj
  // da nema ^ na početku i $ na kraju, onda bi mogao pisati broj od 5 do 9 i devet znamenaka i bilo što ispred i iza njih i validiralo bi se!
  // https://www.youtube.com/watch?v=vPVx-zGFh0w&list=PLsyeobzWxl7qtP8Lo9TReqUMkiOp446cV&index=33 - TU TI JE SVE!
  if(regx.test(username)){
    alert('valid username');
  }else{
    let invalid = document.getElementById('my_lab');
    invalid.style.visibility="visible";
  }
}
</script>



<!-- FORM VALIDATE trim miče whitespaces-->
<script>
function validate(){
 let username = document.getElementById('uname');
 let pass = document.getElementById('pword');

if(username.value.trim() == "" || pass.value.trim() == ""){
alert('problem');
return false;
}else{
  alert('sad je dobro');
  return true;
}
}
</script>



<!-- select extract-->
<script>
function fn3(){
  let v = document.getElementById('se1');
  alert(v.options[v.selectedIndex].value);
}
</script>


<!-- DOM CRAETION/removal-->
<script>

let dada = document.createElement("li");
dada.innerHTML = "to sam ja, hy";
let b = document.getElementById("dodaj");
b.appendChild(dada);


b.style.color="red";
console.log(b.innerHTML);
</script>


<script>
let t = document.getElementById('se1').options[0].value;
console.log(t);

let xxx = document.createElement("option");
xxx.value = "DINAMO";
xxx.innerHTML = "DINAMO JE KLUB";
console.log(xxx);

let tu_dodaj = document.getElementById('se1');
tu_dodaj.appendChild(xxx);






let div = document.getElementById('nesto');
console.log(div);

let add_to_div = document.createElement('p');
add_to_div.innerHTML = "stvoreno iz java scripta"; 
add_to_div.classList.add("marko");

console.log(add_to_div);
div.appendChild(add_to_div);




let body = document.body;

let dodaj = document.createElement('button');
dodaj.innerHTML = "isto iz jsa";
dodaj.classList.add("btn" , "btn-primary" , "btn-lg");
dodaj.value = "BRAVO MARINJO, HVALA TI BOZE";
body.appendChild(dodaj);




let dodaj2 = document.createElement('button');
dodaj2.innerHTML = "js vrh"; 
dodaj2.value = "na vrh svijeta";
dodaj2.classList.add("btn" , "btn-lg" , "btn-danger" );

console.log(dodaj2);

document.body.insertBefore(dodaj2 , document.getElementById("text1"));








function skriveno(){
let tijelo = document.body;

let pravo = document.createElement('div');
pravo.innerHTML = "moj prvi skriveni div!";
pravo.classList.add("skriveno");
pravo.id ="skriveno";



  tijelo.appendChild(pravo);

  let novo_p = document.getElementById('skriveno');
let novi_add = document.createElement('p');
novi_add.innerHTML="Ovo je naknadno dodano isto iz jsa"; 
novi_add.id = "mali";
novi_add.classList.add("skriveni_p");

novo_p.appendChild(novi_add);

}


//MAKI ELEMENT KREIRANI!
function makni(){

  let makni = document.getElementById('skriveno');
  makni.remove();
}
</script>





<!-- input extract-->
<script>
function fn2(){
  
  let rd1 = document.getElementById('rd1');
  let rd2 = document.getElementById('rd2');

  if(rd1.checked==true){
    alert("tVOJ IZVOR JE DA SE TUČEŠ JER SI IZABRAO " +rd1.value);
  }
  else if(rd2.checked == true){
    alert("tvoja emsija je " +rd2.value);
  }else{
    alert('moraš nešto izabrati');
  }
}
</script>



<!-- input from users-->
<script>
function fn1(){
  let str = document.getElementById('text1').value;
  alert("Value is " + str);
}
</script>



<!-- DOM MANIPULATION-->
<script>
 function btnClick() {
  let a =  document.getElementById('heading2');
    if (a.innerHTML == "Random text") {
         a =  document.getElementById('heading2').innerHTML="Geyko pejko!";
  } else {
     a =  document.getElementById('heading2').innerHTML="Random text";
  }
}
</script>




<!-- class MANIPULATION-->
<script>

function changeStyle(){

let element = document.getElementsByClassName('para'); 

for(let x=0; x<element.length; x++){
  element[x].style.color="red";
}

}

</script>





<!---------------------------------------------------------------------------------------------------->
<style>
.marko{
  color:blue;
  }

.skriveno{
  height: 200px;
  width: 200px;
  color: white;
  background: orange;
}

.skriveni_p{
  color: black;
  position: relative;
  margin: 10%;
}

</style>
@endsection