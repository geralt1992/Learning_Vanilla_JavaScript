@extends('master.master')

@section('content')



<div class="container">
    <button id="getText" class="btn-small  teal lighten-4 waves-effect pulse">Get Text</button>
    <br><br>
    <button id="get_users" class="btn-small  blue lighten-4 waves-effect pulse">Get JSON</button>
    <br><br>
    <button id="get_api" class="btn-small  green lighten-4 waves-effect pulse">Get API</button>
    <br><br>
    <button id="btnClear" class="btn-large red darken-4">Clear</button>
    <br><br>


    <form id="addPost">

        <div>
            <input type="text" id="title" placeholder="title">
<<<<<<< HEAD
        </div>
=======
        </div> 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3

        <div>
            <textarea id="body" placeholder="Body"></textarea>
        </div>

            <input class="btn-small  purple lighten-4 waves-effect pulse" type="submit" balue="Submit">

    </form>



    <div id="users"></div>
</>
<script>


//clear button
document.querySelector('#btnClear').addEventListener('click' , clear);

function clear(e) {
    e.preventDefault();
    document.getElementById('users').innerHTML = '';
}


// get plain text
document.getElementById('getText').addEventListener('click' , getText);

function getText(e){
    e.preventDefault();
    const url = "{{route('getData')}}";

    fetch(url)
    .then( (res) => res.text())
    .then( (data) => {
        let parsed = JSON.parse(data);
        console.log(parsed);
        document.getElementById('users').innerHTML = parsed;
    } )
    .catch( (err) => console.log(err));
}



//get json (users)

document.getElementById('get_users').addEventListener('click' , getUsers);

function getUsers(e) {

    e.preventDefault();

    const url = "{{asset('ajaxStuff/users.json')}}";

    fetch(url)
    .then( (res) => res.json() )
    .then( (data) => {

        let out = 'Users: ';

        data.forEach( (user) => {

<<<<<<< HEAD
            out+=
=======
            out+= 
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
            `<ul>
                <li>Id ${user.id}</li>
                <li>Name ${user.name}</li>
                <li>Email ${user.mail}</li>
            </ul>`;
        })

        document.querySelector('#users').innerHTML = out;

    })
    .catch( (err) => console.log(err));
}


//get api as json

document.getElementById('get_api').addEventListener('click' , getApi);


function getApi(e) {
    e.preventDefault();

    const url = 'https://jsonplaceholder.typicode.com/posts';


    fetch(url)
    .then( (res) => res.json())
    .then( (data) => {

        let out = '<h2>Api Posts </h2>';
        console.log(data);

        data.forEach( (post) => {

            out += `<ul>
            <li>Id: ${post.id}</li>
            <li>Title: ${post.title}</li>
            <li>Body: ${post.body}</li>
            </ul>`;

        });

        document.querySelector('#users').innerHTML = out;


    })
    .catch( (err) => console.log(err));
}



class Help {

static rremove() {
    document.getElementById('title').innerHTML = '';
    document.getElementById('body').innerHTML = '';
}
}

document.getElementById('addPost').addEventListener('submit' , addPost);



function addPost(e) {
    e.preventDefault();

    let title = document.getElementById('title').value;
    let body = document.getElementById('body').value;
    Help.rremove();
    let params = {
        "title" : title,
        "body" : body
    }
    let headers = {
        'Accept' : 'application/json , text/plain , */*' ,
        'Content-type' : 'application/json'
    }
    let url = 'https://jsonplaceholder.typicode.com/posts';


    fetch(url , {
        method : 'POST',
        headers : headers,
        body : JSON.stringify(params)
    })
    .then( (res) => res.json())
    .then( (data) => console.log(data))
    .catch( (err) => console.log(err));


}


</script>



<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
