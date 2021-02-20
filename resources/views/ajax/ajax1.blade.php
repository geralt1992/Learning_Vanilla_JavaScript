@extends('master.master')
@section('content')


<!-- ajax1 - text file-->
<button class="pulse red lighten-2  btn-small" id="button">Get Text File</button>
<br><br>

<div id="text"></div>


<script>

    //create event listener
    document.querySelector('#button').addEventListener('click' , loadText);

    function loadText(){
       
       //create xhr object
       let xhr = new XMLHttpRequest();
       //OPEN - type, url/filename, async (true or false)
      xhr.open('GET' , '{{asset('ajaxStuff/sample.txt')}}' , true);

      //ONLOAD - nakon loada što se desi
      xhr.onload = function(){
          //check for status of response
          if(xhr.status == 200){
           document.getElementById('text').innerHTML = xhr.responseText;
          }else if(xhr.status = 404){
            document.getElementById('text').innerHTML = 'Not Found';
          }
      }

      //ONERROR - handle error
      xhr.onerror = function(){
          console.log('Request Error');
      }

      //SEND - sends request
      xhr.send();
    }



</script>


@endsection