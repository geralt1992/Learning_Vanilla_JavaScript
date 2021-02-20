@extends('master.master')

@section('content')

<!-- KORIŠTENO-->

    <!-- VANILLA JS-->
    <!-- MATERIALAZE CSS -->
  

<div class="container">
    <h1 class="center-align">Moji kontakti</h1>
    <ul class="collection with-header" id="names">

    <input type="text" placeholder="Search" id="my_input" style="width: 50%; margin-left: 5%;">

        <li class="collection-header">
            <h5>A</h5>
        </li>

            <li class="collection-item">
                <a href="#">Alen</a>
            </li>

            <li class="collection-item">
                <a href="#">Alma</a>
            </li>

            <li class="collection-item">
                <a href="#">Aki</a>
            </li>

            <li class="collection-item">
                <a href="#">Aco</a>
            </li>



        <li class="collection-header">
            <h5>B</h5>
        </li>

            <li class="collection-item">
                <a href="#">Borna</a>
            </li>

            <li class="collection-item">
                <a href="#">Baka</a>
            </li>

            <li class="collection-item">
                <a href="#">Bigi</a>
            </li>

            <li class="collection-item">
                <a href="#">Biloš</a>
            </li>



        <li class="collection-header">
            <h5>C</h5>
        </li>

            <li class="collection-item">
                <a href="#">Cicko</a>
            </li>

            <li class="collection-item">
                <a href="#">Cmoljo</a>
            </li>

            <li class="collection-item">
                <a href="#">Ciro</a>
            </li>

            <li class="collection-item">
                <a href="#">Cita</a>
            </li>



        <li class="collection-header">
            <h5>D</h5>
        </li>

            <li class="collection-item">
                <a href="#">Dario</a>
            </li>

            <li class="collection-item">
                <a href="#">Domagoj</a>
            </li>

            <li class="collection-item">
                <a href="#">Dida</a>
            </li>

            <li class="collection-item">
                <a href="#">Dinko</a>
            </li>
    </ul>
</div>


<script>


let input = document.getElementById('my_input');

input.addEventListener('keyup' , search);

function search(e){


    let inputValue = e.target.value.toUpperCase();

    let ul = document.getElementById('names');

    let li = ul.querySelectorAll('.collection-item');

    for(let i = 0; i < li.length; i++){

        let a = li[i].getElementsByTagName('a')[0];

        if(a.innerHTML.toUpperCase().indexOf(inputValue) > -1){

            li[i].style.display = "";
        }else{
            li[i].style.display = "none";
        }
    }



    
}

</script>

@endsection


