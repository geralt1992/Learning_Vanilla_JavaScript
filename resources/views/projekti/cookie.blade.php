@extends('master.master')

@section('content')

<div class="container" style="height: 100vh;">
dada

    <div id="cookiee" class="cookie">
        Ovo su uvjeti korištenja da li ti to prihvaćaš?  <a href="#">Uvjeti!</a>
        <button id="cookieBtn" class="waves-effect waves-light btn-small right">Slažem se</button>
    </div>


</div>





<script>

document.addEventListener('DOMContentLoaded' , () => {

    let store = localStorage;

    if(store.getItem('consent')){
        let cookie = document.getElementById('cookiee');
        cookie.classList.add("no");
    }
})


document.getElementById('cookieBtn').addEventListener('click' , (e) => {

    e.preventDefault();

    let cookie = document.getElementById('cookiee');
    cookie.classList.add("no");

    let store = localStorage;
    if(!store.getItem('consent')){
        let con = "accepted"; 
        store.setItem('consent' , JSON.stringify(con));
    }
})



</script>



<style>

    .cookie{
        position:absolute;
        bottom:0;
        left: 0;
        padding: 2rem;
        width: 100%;
        background: #f3f3f3f3;
    
    }

    .no{
        visibility: hidden !important;
    }
</style>






@endsection