
//importan css - sad sve ide preko one jedne skripte
import "../css/reddit.css";


//import object u kojem je search funkcija koja radi fetch
import object from '../../resources/views/projekti/redditapi'

let searchForm = document.getElementById('search-form');
let searchInput = document.getElementById('search-input');

searchForm.addEventListener('submit' , (e) => {
    e.preventDefault();

    //get serach term
    let searchTerm = searchInput.value;
    //any input that has name of sortby and one that is checkd = input[name="sortby"]:checked
    let sortBy = document.querySelector('input[name="sortBy"]:checked').value;
    //limit
    let searchLimit = document.getElementById('limit').value;


    //check input
    if(searchTerm == ''){
        showmMessage('Please Add Term' , 'red');
    }

    //search Reddit - to je ono gore import drug js file
    //to je obični fetch
    object.search(searchTerm, searchLimit, sortBy)
    .then( results => {

        let output = `<div class="row">` ;

        results.forEach( (post) => {
            //check for image if have src in object
            //if that exist grab preview else (: = else)
            let image = post.preview ? post.preview.images[0].source.url : 'https://external-preview.redd.it/xEUwOx55wRYEWk_xYlBLQNS3O4QDcnZS4Yx0fs27CEc.png?width=640&crop=smart&auto=webp&s=ca3c1caa798a2dc3cbbcd16db35c26dfd01afe7c';

            output+= `
            <div class=" col s12 m3">
                <div class="card blue-grey darken-3" style="float: left;">
                    <div class="card-image">
                        <img src=${image}>
                    </div>

                    <div class="card-content white-text ">
                        <span class="card-title">${post.title}</span>
                        <p>${truncateText(post.selftext, 100)}</p>
                    </div>
                        <div class="card-action ">
                        <a href="${post.url}" target="_blank">Read more!</a>
                        </div>

                        <div class="card-action ">
                        <a href="#" ><span class="white-text right" style="text-weight:900;">Subreddit: ${post.subreddit}</span> </a>
                        <br><br>
                        <a href="#" "><span class="white-text right" style="text-weight:900;">Score: ${post.score}</span> </a>
                        </div>
                </div>
            </div>
            `;
        });
        output+= ` </div> </div>`;



        document.getElementById('results').innerHTML = output;
        let searchTerm = searchInput.value = '';
    });
});

//show message
function showmMessage(message, className){
    let div = document.createElement('div');
    div.classList.add(`${className}` , 'lighten-5');
    div.style.padding = '2rem';
    //add message
    div.appendChild(document.createTextNode(message));

    //get parent
    let searchContainer = document.getElementById('search-container');
    //get search
    let search = document.getElementById('search');

    //insert message - umetni "div"  prije "searcha"
    searchContainer.insertBefore(div , search);


    //timeout alert
    setTimeout(() => {
        div.style.display = 'none';
    }, 3000);
}

 function truncateText(text , limit){
    //making sure that i ll be end of word when we cut of
    //if dosent match space i ll retur -1
    let shortened = text.indexOf(' ' , limit);

    if(shortened == -1) return text;
    return text.substring(0 , shortened);
}


