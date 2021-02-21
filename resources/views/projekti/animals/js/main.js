import fetchJsonP from 'fetch-jsonp';
import {isValidZip} from './validate.js';


const petForm = document.querySelector('#pet-form');

petForm.addEventListener('submit' , fetchAnimals);

//fetch animals from api

function fetchAnimals(e){
    e.preventDefault();

    //get user input
    const animal = document.querySelector('#animal').value;
    const zip = document.querySelector('#zip').value;

    //validate zip
    if(!isValidZip(zip)){
        showALert('sjebo si zip!' , 'danger');
        return;
    }

    //fetch pets - u url staviš, gdje ide, format, peta, lokaciju i key
    fetchJsonP(`http://api.petfinder.com/pet.find?format=json&key=bouWFA3DoKM4Q8ByGgSmWiS4NRAZ2491vvQ0r657QetAZBXD9h&animal=${animal}&location=${zip}&callback=callback` , {
        jsonpCallbackFunction: 'callback'
    })
    .then( res => res.json())
    .then( data => showAnimals(data.petfinder.pets.pet))
    .catch( e => console.log(e));
}


//json callback
function callback(data){
    console.log(data);
}


//show listenings of pets

function showAnimals(pets){
    const results = document.querySelector('#results');

    //clear previus results - $t je zbg njihovog apia
    results.innerHTML = '';

    pets.forEach( (pet) => {
        const div = document.createElement('div');
        div.classList.add('card' , 'card-body' , 'mb-3');
        div.innerHTML = `

        <div class="row">
            <div class="col-sm-6">
                <h4>${pet.name.$t} (${pet.age.$t})</h4>
                <p class="text-secondary">${pet.breeds.breed.$t}</p>
                <p>${pet.contact.adress1.$t} ${pet.contact.city.$t} ${pet.contact.state.$t} ${pet.contact.zip.$t}/p>
                <ul class="list-group">
                    <li class="list-group-item">Phone: ${pet.contact.phone.$t}</li>
                    ${pet.contact.email.$t ? `<li class="list-group-item">Email: ${pet.contact.email.$t}</li>` : ``}
                    <li class="list-group-item">Shalter ID: ${pet.shalterId.$t}</li>
                </ul>
            </div>


            <div class="col-sm-6 text-center">
                <img class="img-fluid rounderd-circle mt-2"src=${pet.media.photos.photo[3].$t}/>
            </div>
        </div>
        `;

        results.appendChild(div);
    });
}
