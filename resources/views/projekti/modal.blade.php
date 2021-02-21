@extends('master.master')

@section('content')



<div class="container ">
    
    <button id="modalBtn" class="button">Click</button>

    <div id="simpleModal" class="mmodal">
        <div class="mmodal-content">

            <div class="mmodal-header">
                <span  class="closeBtn">&times;</span>
                <h1>Modal Header</h1>
            </div>
            
            <div class="mmodal-body">
                <p style="color:black !important;">Hello I am Modal</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae exercitationem consequuntur porro officiis laboriosam ut fugiat ipsa culpa iure? Quia.</p>
            </div>
        
            <div class="mmodal-footer">
                <h4>Modal Footer</h4>
            </div>

        </div>
    </div>
</div>



<script>


let modal = document.getElementById('simpleModal');
let modalBtn = document.getElementById('modalBtn');
let closeBtn = document.getElementsByClassName('closeBtn')[0];

    modalBtn.addEventListener('click' , openModal);

function openModal(e){
    e.preventDefault();
    modal.style.display = "block";
}

    closeBtn.addEventListener('click' , closeModal);

function closeModal(){
    modal.style.display = "none";
}

//outside click
    window.addEventListener('click' , clickOutSide);

function clickOutSide(e){
if(e.target == modal){
    modal.style.display = "none";
}
}


</script>


<style>

.button{
    background:coral;
    padding: 1em 2em;
    color: white;
    border: 0;
}

.button:hover{
    background:#333;
}

.mmodal{
    display:none;
    position: fixed;
    z-index: 1;
    left: 0; 
    top: 0;
    height: 100%;
    width: 100%;
    overflow: auto;
    background-color: rgba(0 , 0, 0, 0.5);
}

.mmodal-content{
    background:  #f3f3f3 !important;
    color: black;
    margin: 15% auto;
    /* padding: 20px; */
    width: 70%;
    box-shadow: 0 5px 8px 0 rgba(0 , 0 , 0, 0.2) , 0 7px 20px 0 rgba(0 , 0 , 0, 0.17);
    animation-name: modalopen;
    animation-duration: 1.5s;
}

.closeBtn{
    color: #ccc;
    float: right;
    font-size: 30px;
    color: white;
}

.closeBtn:hover{
    cursor:pointer;
    color: blacK;
    text-decoration: none;
}

@keyframes modalopen{
    from {opacity: 0} 
    to{opacity: 1}
}













.mmodal-header h1 , .mmodal-footer h4{
    margin: 0;
}

.mmodal-header{
    background: coral;
    padding: 15px;
    color: white;
}

.mmodal-body{
    padding: 50px 20px;
}

.mmodal-footer{
    background: coral;
    padding: 10px;
    color: white;
    text-align: center;
}



</style>
@endsection