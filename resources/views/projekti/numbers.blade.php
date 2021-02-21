@extends('master.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card bg-primary text-white mt-5 p-4">
                <h3>Number facts</h3>
                <p>Enter number and get fact!</p>
                <input type="number" class="form-control form-control-lg" id="numberInput" placeholder="Enter num!" style="color:white;">
                <div id="fact" class="card-body">
                    <h4 class="card-title">Number Fact</h4>
                    <p id="factText" class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    let fact = document.querySelector('#fact');
    let factText = document.getElementById('factText');
    let numberInput = document.querySelector('#numberInput');

    //fora - input sluša i bilježi svaku promijenu na unosu i s arrowom i deletom i dodavanjem
    numberInput.addEventListener('input' , getFactAjax);


    function getFactAjax(){

        let number = numberInput.value;
        let xhr = new XMLHttpRequest();

        //RJEŠENJE KADA TREBAŠ SLATI DINAMIČNO JS KROZ LARAVEL!!!
        let url = `http://numbersapi.com/${number}`;

        xhr.open('GET' , url , true);
        xhr.onload = function(){
            if(xhr.status == 200 && number != ''){
                fact.style.display = 'block';
                factText.innerHTML = xhr.responseText;
            }else{
                console.log('Not found!');
            }
        }
        xhr.send();
    }



//FETCH

    function getFactFetch(){

        let number = numberInput.value;
        let url = `http://numbersapi.com/${number}`;

        fetch(url)
        .then( (response) => response.text())
        .then( (data) => {

            if(number != ''){
                fact.style.display = 'block';
                factText.innerHTML = data;
            }
        })
        .catch( (e) => console.log(e));

    }

</script>

<style>
#fact{
    display: none;
    }

</style>
@endsection