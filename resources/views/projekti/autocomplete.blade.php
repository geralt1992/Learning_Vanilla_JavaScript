@extends('master.master')
@section('content')




<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 m-auto">
            <h3 class="text-center mb-e">
                State Capital LookUp
            </h3>

            <div class="form-group">
                <input type="text" id="search" class="form-control form-control-lg" placeholder="enter State name">
            </div>

            <div id="match-list"></div>
        </div>
    </div>
</div>




<script>


let search = document.getElementById('search');
let matchList = document.getElementById('match-list');
const url = '{{asset('autoCompleteStuff/states.json')}}'


async function searchStates(searchText){
    const res = await fetch(url);
    const states = await res.json();

    let matches = states.filter( (state) => {

        const regex = new RegExp(`^${searchText}` , 'gi');
        
        if(state.name.match(regex) || state.abbr.match(regex)){
            return state;
        }
    });

    if(searchText.length === 0){
        matches = [];
        matchList.innerHTML = '';
    }

    outputHtml(matches);
    };

//show res in html

const outputHtml = matches => {
    if(matches.length > 0){
        const html = matches.map( (match) => `
        <div class="card card-body mb-1">
            <h4>${match.name} (${match.abbr}) <span class="text-primary">${match.capital}</span></h4>
            <small>Lat: ${match.lat} / Long: ${match.long}</small>
        </div>
        <br>
        `)
        .join('');

    matchList.innerHTML = html;
    }
}

search.addEventListener('input' , () => searchStates(search.value));


</script>

@endsection