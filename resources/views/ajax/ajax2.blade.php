@extends('master.master')
@section('content')


<!-- ajax2 - local JSON-->
<div class="container">
<button class="pulse green lighten-2  btn-small" id="button1">Get User</button>
<br>
<br>
<button class="pulse orange lighten  btn-small" id="button2">Get Users</button>

<br>
<br>
<h1>User</h1>
<div id="user"></div>

<br>
<br>
<h1>Users</h1>
<div id="users"></div>




</div>






<script>



//e listeners
document.querySelector('#button1').addEventListener('click' , oneUser);
document.getElementById('button2').addEventListener('click' , manyUsers);

function oneUser(e){
  e.preventDefault();
 
  
  var xhr = new XMLHttpRequest();

  xhr.open('GET' , '{{asset('ajaxStuff/user.json')}}' , true);

  xhr.onload = function (){
    
    if(xhr.status == 200){

      let parsedResponse = JSON.parse(xhr.responseText);

      var output = '';

      for(let i = 0; i < parsedResponse.length; i++){
        output += 
      ` <ul>
          <li>${parsedResponse[i].id}</li>
          <li>${parsedResponse[i].name}</li>
          <li>${parsedResponse[i].email}</li>       
        </ul>`;
      }

      document.getElementById('user').innerHTML = output;

    }else {
     User.alerMe('nema sadržaja' , 'red');
    }

  }
  xhr.send();
}



class User  {

  static alerMe(message , color){

    let n = document.createElement('div');
    n.id = 'alert';
    n.classList.add(`${color}`);
    n.style.marginTop = "2rem";
    n.textContent = message;

    let place = document.getElementById('container');

    place.appendChild(n);
  }
}




function manyUsers(){

var xhr = new XMLHttpRequest();

xhr.open('GET', '{{asset('ajaxStuff/users.json')}}' ,true);

xhr.onload = function(){

  if(xhr.status == 200){
    
    
   let parsedResponse = JSON.parse(xhr.responseText);

   console.log(parsedResponse)
   var output = '';
   for(let x = 0; x < parsedResponse.length; x++){

    output += 
    `<ul>
      <li>${parsedResponse[x].id}</li>
      <li>${parsedResponse[x].name}</li>
      <li>${parsedResponse[x].email}</li>    
    </ul>`;
   }

   document.getElementById('users').innerHTML = output;



  }
}

  xhr.send();
}











</script>


@endsection