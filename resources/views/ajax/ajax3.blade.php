@extends('master.master')
@section('content')


<!-- ajax3 - from apis-->
<div class="container">
<button class="pulse red lighten-4 btn-small" id="button">Load GitHub Users</button>
<br>

<h1>GitHub Users</h1>
<div id="users"></div>

<script>



//e listeners

document.getElementById('button').addEventListener('click' , apiUsers);

function apiUsers(){
   
   
    var xhr = new XMLHttpRequest();

    xhr.open('GET' , "https://api.github.com/users"   , true);
   
    
    xhr.onload = function(){

        if(xhr.status == 200){
            
            let parsedItems = JSON.parse(xhr.responseText);

            console.log(parsedItems)
            
            var output = '';

            for(let i = 0; i < parsedItems.length; i++){

                 output +=
                `<ul>
                    <li> ID ${parsedItems[i].id}</li>
                    <li> IME ${parsedItems[i].login}</li>
                    <li> TYPE ${parsedItems[i].type}</li> 
                    <li> <a href=${parsedItems[i].url} target=_blank >Posjeti me</a> </li>
                </ul>`;
                
            }

            document.getElementById('users').innerHTML = output;





        }else{
            console.log('ne')
        }


    }


    xhr.send();



}


</script>


@endsection