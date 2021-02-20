@extends('master.master')
@section('content')






<script>

//CALLBACKS
const posts = [
    { title: 'Post One' , body: 'This is post one'},
    { title: 'Post Two' , body: 'This is post two'}
];

//SAD BI BIO PROBLEM STO NAKON 1 SEC ON PRIKAZE TITLOVE I NE UGURA POST OD ISPOD
//KOJI IMA TAJMER 2 SEC JER JE DOM VEĆ PAINTED
//RJEŠENJE JE CALLBACK!

function getPosts() {

    setTimeout(() => {
        let output = '';

        posts.forEach( (post) => {
            output += `<li>${post.title}</li>`;
        });

        document.body.innerHTML = output;
    }, 1000);
}


function createPost(post , callback) {

    setTimeout(() => {
        posts.push(post);
        callback();
    }, 2000);
}


function creatPostCallbacks( post , callback){

    setTimeout(() => {

        posts.push(post);
        callback();
        
    }, 2000);
}
//getposts je ubačen kao callback
creatPostCallbacks({ title: 'Post Callback' , body: 'This is post Callback'} ,getPosts);




//PROMISES
function getPosts() {

    setTimeout(() => {
        let output = '';

        posts.forEach( (post) => {
            output += `<li>${post.title}</li>`;
        });

        document.body.innerHTML = output;
    }, 1000);
}




function createPostPromises(post) {
//vraća promis, kada se odradi postpush, ako nema err, ideš na resolve
    return new Promise( (resolve, reject) => {

        setTimeout(() => {
            posts.push(post);
            const error = false;

            if(!error) {
                resolve('JA DODO');
            }else {
                rejecet('Error');
            }
        }, 1000);

    });
    
}


//odradi post push, onda kad je reslove pozvan (to je zapravo ovdje .then() onda zove što je u .then u )
createPostPromises({ title: 'Post Promise' , body: 'This is post Promise'} )
.then((values) => console.log(values))
.then(getPosts)
.catch( (err) => console.log(err));


//promise all -- ZA ROKNUT VIŠE PROMISESA ODJEDANPUT

const promise1 = Promise.resolve('Hello world');
const promise2 = 10;
const promise3 = new Promise( (resolve , reject) => {
    setTimeout( resolve('GoodBye'), 2000)
});
const promises4 = fetch('https://jsonplaceholder.typicode.com/users')
    .then( (res) => res.json());

Promise.all([promise1, promise2, promise3, promises4]).then(values => console.log(values));


//SYNC AWAIT
// funckija mora imati async ako se hoce u njoj upotrijebiti await
// await samo čeka da se jedan proces završi pa će se onda ostalo izvesti nakon toga


async function init() {
    //znači mi čekao da se ovo createPostcAllbacks dogodi i kad se to dogodi onda se odrađuje getPosts()
    await createPostPromises({ title: 'Post Callback-AWAIT' , body: 'This is post Callback-AWAIT'});

    getPosts();
}

init();


//SYNC AWAIT - WITH FETCH
async function fetchUsers() {

    const res = await fetch('https://jsonplaceholder.typicode.com/users');
    const data = await res.json();

    console.log('Došlo iz await fetcha!');
    console.log(data);
}

fetchUsers();



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

let obj = {

    "name" : "marin",
    "surname" : "sabljo",
    "city" : "osijek"
}

function a(data){
    return new Promise( (reslove, reject) => {
        setTimeout(() => {
            console.log('iz prve funkcije ' +  data.city);
            reslove(data.surname);
        }, 2000);
    });
}

function b(data2){
    return new Promise( (reslove, reject) => {
        setTimeout(() => {
            console.log('iz druge funkcije ' + data2);
            reslove('GOTOVE FUNKCIJE');   
        }, 1000);
    });
}

a(obj)
.then( (res1) => {
    console.log(res1);
    console.log('neka radnja prvi then ' + res1);
    b(res1)
        .then( (res2) => console.log(res2));
    let back = 'SVE GOTOVO';
    return back;
})
.then( (res3) => console.log(res3))
.catch( (e) => console.log(e));

let p1 = Promise.reslove('go');
let p2 = 0;
let p3 = new Promise( (reslove , reject) => { setimeout( reslove('da') , 1000)});
let p4 = fetch(url).then((res) => res.json().then((data) => {
    out = '';
    data.forEach( (user) => {
        out+= `${user.name}`;
    });
    document.getElementById('user').innerHTML = out;
}))

Promise.all([p1, p2, p3, p4]).then((values) => console.log(values));


</script>
@endsection