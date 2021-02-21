@extends('master.master')
@section('content')


<!-- ajax4 - from db with laravel-->

<div class="container">
<button class="pulse blue lighten-4 btn-small" id="button">Load Bazu</button>


<br>
<br>

<button class="pulse green lighten-4 btn-small" id="button2">Load JSON 1</button>

<br>
<br>

<button class="pulse purple lighten-4 btn-small" id="button3">Load API</button>

<br>
<br>

<button class="pulse yellow darken-3 btn-small" id="button4">MOJ API</button>

<br>
<br>
<br>

<button class="waves-effect wave-light red darken-4 btn-large" id="buttonC">Očisti</button>

<br>
<br>

<h1>Podatci</h1>
<div id="users"></div>





<!-- ajax4 - POST-->

<i class="material-icons prefix">account_circle</i>
<input type="text" id="name" class="name">

<br><br>

<i class="material-icons prefix">email</i>
<input type="text" id="mail" class="mail">
<br><br>

<button class="btn-floating btn-large waves-effect waves-light violet" type="submit" id="saveBtn">Send</button>


@isset($data_base)
    <div>
        @foreach($data_base[0] as $data)

        <h6>{{$data}}</h6>

<<<<<<< HEAD
        @endforeach
=======
        @endforeach 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
    </div>
@endisset
</div>

<script>

    // MOJ API IZ DRUGE MOJE APLIKACIJE!!!

document.getElementById('button4').addEventListener('click' , (e) => {

e.preventDefault();

let xhr = new XMLHttpRequest();

let url = "http://localhost/nabijem/public/api/api_get";

xhr.open('GET' , '{{url("http://localhost/nabijem/public/api/api_get")}}' , true);

xhr.onload = function() {

    if(xhr.status == 200){

        let out = '';
        let parsed = JSON.parse(xhr.responseText);

        for(let i = 0; i < parsed.length; i++){

<<<<<<< HEAD
            out +=
=======
            out += 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
                    `<ul>
                    <li class="id">${parsed[i].id}</li>
                    <li>User: ${parsed[i].user}</li>
                    <li>Zbog: ${parsed[i].nabijem_zbog}</li>
<<<<<<< HEAD
                    </ul>`;
=======
                    </ul>`;   
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
        }
        document.querySelector('#users').innerHTML = out;
    }
}
xhr.send();
})



<<<<<<< HEAD

=======
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
document.getElementById('saveBtn').addEventListener('click' , saveData);

function saveData(e){

    e.preventDefault();

    let name = document.getElementById('name').value;
    let mail = document.getElementById('mail').value;
    let params = {
        "name" : name,
        "mail" : mail
    }
    let xhr = new XMLHttpRequest();

    xhr.open('POST' , '{{route("saveData")}}' ,true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content );

    xhr.onload = function() {

        if(xhr.status == 200) {
            let parsed = JSON.parse(xhr.responseText);
            console.log('Uspješno spremljeno ' + parsed.name);
        }else {
            console.log("not found!");
        }
    }
    xhr.send(JSON.stringify(params));
}


class Help {

static rremove(){

        document.getElementById('name').value = '';
        document.getElementById('mail').value = '';

    }

}





document.getElementById('button').addEventListener('click' , getData);

function getData() {


    let xhr = new XMLHttpRequest();

    xhr.open('GET' , '{{route("getData")}}' ,true);
    xhr.onload = function () {

        if(xhr.status == 200){

            let parsedRes = JSON.parse(xhr.responseText);
            let out = '';
<<<<<<< HEAD

            parsedRes.forEach( (user) => {

                out +=
=======
            
            parsedRes.forEach( (user) => {

                out += 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
                `<ul>
                    <li>${user.id}</li>
                    <li>Id ${user.name}</li>
                    <li>Id ${user.mail}</li>
                    <li> <a href="#" class="btn waves-effect wave-light red lighten-3 delete" onclick = "delete_function(event)">briši</a></li>
                </ul>`;
            })

<<<<<<< HEAD
            document.getElementById('users').innerHTML = out;

=======
            document.getElementById('users').innerHTML = out; 
            
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
        }else{
            console.log("not found!");
        }
    }
    xhr.send();
}










function delete_function(e){
    e.preventDefault();
    let Xbtn = e.target;
<<<<<<< HEAD


    //izvućen id od kliknutog elementa
    let ul =  Xbtn.parentNode.parentNode;
    var clicked_id = ul.children[0].innerHTML;

    //preko ajax get dođi do svih unosa iz baze kako bi mogao usporediti kliknuti id elementa s unosima iz baze
=======
    
        
    //izvućen id od kliknutog elementa  
    let ul =  Xbtn.parentNode.parentNode;
    var clicked_id = ul.children[0].innerHTML;
   
    //preko ajax get dođi do svih unosa iz baze kako bi mogao usporediti kliknuti id elementa s unosima iz baze 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
    var xhr = new XMLHttpRequest();

        xhr.open('GET' , '{{route("getData")}}' , true);
        xhr.onload = function() {

            if(xhr.status == 200){

            let parRes = JSON.parse(xhr.responseText);
<<<<<<< HEAD
                //loop kroz bazu i potraga za istim elementom
=======
                //loop kroz bazu i potraga za istim elementom 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
                for(let i = 0; i < parRes.length; i++){

                let dbId = parRes[i].id;

<<<<<<< HEAD
                //ako su kliknuti element i element iz baze isti
                if(dbId == clicked_id){

                    //ajax post šalje id na kontroler kako bi on našao unos i izbrisao ga!
=======
                //ako su kliknuti element i element iz baze isti  
                if(dbId == clicked_id){
                
                    //ajax post šalje id na kontroler kako bi on našao unos i izbrisao ga! 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
                    var xhr2 = new XMLHttpRequest();
                    var params = {
                        "id" : clicked_id
                    }

                    xhr2.open('POST' , '{{route("ajax_delete")}}' , true);

                    xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr2.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content );
<<<<<<< HEAD

                    xhr2.onload = function() {

=======
                    
                    xhr2.onload = function() {
                        
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
                       //ajax post vraća response sa svim novim unosima iz baze (bez izbrisanog elementa!)
                        let parRes2 = JSON.parse(xhr2.responseText);
                        var output2 = '';

                        for(let j = 0; j < parRes2.length; j++){

<<<<<<< HEAD
                            output2 +=
=======
                            output2 += 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
                                `<ul>
                                <li class="id">${parRes2[j].id}</li>
                                <li>Name ${parRes2[j].name}</li>
                                <li>Email ${parRes2[j].mail}</li>
                                <li> <a href="#" class="btn waves-effect wave-light red lighten-3 delete" onclick = "delete_function(event)">Obriši</a></li>
<<<<<<< HEAD
                                </ul>`;
=======
                                </ul>`;   
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
                            }
                            document.querySelector('#users').innerHTML = output2;
                    }
                    xhr2.send(JSON.stringify(params));
                    }
                }
            }
    }

        xhr.send();
}













////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
















document.getElementById('button2').addEventListener('click' , jsonFrom);


function jsonFrom(){
<<<<<<< HEAD
=======
   
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3

            var xhr = new XMLHttpRequest;

            xhr.open('GET' , '{{asset('ajaxStuff/user.json')}}' , true);

            xhr.onload = function(){

                if(xhr.status == 200){

                console.log(JSON.parse(xhr.response))

                let pars = JSON.parse(xhr.responseText);

                    for(let x = 0; x < pars.length; x++){

                    document.getElementById('users').innerHTML = `${ pars[x].name} <br> ${ pars[x].email} <br> ${ pars[x].id}  `;
                    }
                }
            }

            xhr.send();


        }






document.querySelector('#button3').addEventListener('click' , apiData);

function apiData(){

    var xhr = new XMLHttpRequest();

    xhr.open('GET' , 'https://api.github.com/users' , true);
    xhr.onload = function(){

        if(xhr.status == 200){

        var parsedItems = JSON.parse(xhr.response);
            var output = '';
        for( let i = 0; i < parsedItems.length; i++){

<<<<<<< HEAD
            output  +=
            `<ul>
                    <li> ID ${parsedItems[i].id}</li>
                    <li> IME ${parsedItems[i].login}</li>
                    <li> TYPE ${parsedItems[i].type}</li>
                    <li> IMG <img src= ${parsedItems[i].avatar_url} ></li>
=======
            output  += 
            `<ul>
                    <li> ID ${parsedItems[i].id}</li>
                    <li> IME ${parsedItems[i].login}</li>
                    <li> TYPE ${parsedItems[i].type}</li> 
                    <li> IMG <img src= ${parsedItems[i].avatar_url} ></li> 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
                    <li> <a href="${parsedItems[i].url}" target=_blank >Posjeti me</a> </li>
                </ul>`;
        }

        document.getElementById('users').innerHTML = output;
        }
    }
    xhr.send();

}

document.querySelector('#buttonC').addEventListener('click' , (e) => {

let clear = document.getElementById('users').innerHTML = '';
})


</script>



<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
