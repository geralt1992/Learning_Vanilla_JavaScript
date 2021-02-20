@extends('master.master')

@section('content')

<!-- KORIŠTENO-->

    <!-- VANILLA JS-->
    <!-- BOOTSTRAP CSS -->
  

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-3">
        <h1 class="display-4 text-center mb-3">Weight Converter LBS to GR/KG/OZ</h1>

        <form>
            <div class="form-group">
                <input style="color:white !important;" id="lbsInput" type="number" class="form-control-lg form-control" placeholder="Enter">
            </div>
        </form>

        <div class="" id="output">
            
            <div class="card bg-primary mb-2" >
                <div class="card-block">
                <h4>Grams</h4>
                    <div id="gramsOutput">
                    
                    </div>
                </div>
            </div>

             
            <div class="card bg-success  mb-2">
                <div class="card-block">
                <h4>Kilograms</h4>
                    <div id="kgOutput">
                    
                    </div>
                </div>
            </div>

             
            <div class="card bg-danger  mb-2">
                <div class="card-block">
                <h4>Ounces</h4>
                    <div id="ozOutput">
                    
                    </div>
                </div>
            </div>

        </div>


        </div>
    </div>
</div>


<script>

//ne pokazi odmah kartice
document.getElementById('output').style.visibility = "hidden";

let input = document.getElementById('lbsInput');
input.addEventListener('keyup' , convert);

function convert(e){

    let lbs = e.target.value;

    //prikazi kartice kad pocnes tipkat
    document.getElementById('output').style.visibility = "";

    //pounds to grams - mmozes tako izravno pisati bez varijable
    document.getElementById('gramsOutput').innerHTML = lbs/0.0022046;

    //pounds to kg
    document.getElementById('kgOutput').textContent = lbs*0.453592;

    //pounds to oz
    document.getElementById('ozOutput').textContent = lbs*16;
   

}



</script>

<style>

    body{
        margin-top: 70px;
        background: #f3f3f3;
        color: #fff;
    }
</style>

@endsection


