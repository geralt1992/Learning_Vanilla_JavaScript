@extends('master.master')
@section('content')


    <div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">BookMarker!</h3>
    </div>

    <div class="jumbotron">
        <h1 class="center">BookMark Your Fav Site</h1>

    <form id="myForm">

    <div class="form-group">
        <label for="siteName">Site Name</label>
        <input type="text" class="form-control" id=siteName>
    </div>

    <div class="form-group">
        <label for="siteURL">Site URL</label>
        <input type="text" class="form-control" id=siteURL>
    </div>

    <button type="submit" id="myBtn" class="btn waves-effect">Submit</button>

    </form>
    </div>

    <div class="row marketing">
        <div class="col-lg-12">
        <div id="bookmarksResults" ></div>
        </div>

    </div>

    <hr>
    <footer class="footer right">
        <p>&copy; 2020 BookMarker, Inc.</p>
    </footer>

    </div> <!-- /container -->


<script>



document.getElementById('myBtn').addEventListener('click' , saveBookmark);

function saveBookmark(e){
    e.preventDefault();

    let siteName = document.getElementById('siteName').value;
    let siteURL = document.getElementById('siteURL').value;


    if(!validateForm(siteName, siteURL)){

        return false;
    }

    let mark = {
        name : siteName,
        url : siteURL
    }





    //local storege stores only strings  -- NAČIN ZA GURAT U LOCAL STORE!
    if(localStorage.getItem('bookmarks') === null){
        var bookmarks = [];
        bookmarks.push(mark);
        localStorage.setItem('bookmarks' , JSON.stringify(bookmarks));
    }else{
        var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
        bookmarks.push(mark);
        localStorage.setItem('bookmarks' , JSON.stringify(bookmarks));
    }

    fetchBookmarks();
    Utillity.erase();
}



//ZGODNO -> NA BODYI STAVIŠ! -> onload = "fetchBookmarks()"
function fetchBookmarks(){

    var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));

    var bookmarsResults = document.getElementById('bookmarksResults');

    bookmarsResults.innerHTML = '';
    for(let i = 0; i < bookmarks.length; i++){

        var name = bookmarks[i].name;
        var url = bookmarks[i].url;

        bookmarsResults.innerHTML +=
        `<div class="well">
            <h3>${name}
                <a class="btn btn-default blue lighten-4 pulse" traget="_blank" href="${url}">Visit</a>
                <a onclick="deleteBookmark(\ '${url}' \)" class="btn btn-default green lighten-4 pulse" href="#">Delete</a>
            </h3>
        </div>`;
    }
}




//onclick="deleteBookmark(\ '${url}' \)" SUPER STVAR ZA STAVITI NEŠTO KAO ARGUMENT!

function deleteBookmark(url){

    //get bookmarks from local store
    var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));

    for(let i = 0; i < bookmarks.length; i++){

        if(bookmarks[i].url == url){
            //remove from local store array
            bookmarks.splice(i , 1);
        }
    }
    localStorage.setItem('bookmarks' , JSON.stringify(bookmarks));

    //refetch bookmarks
    fetchBookmarks();
}





function validateForm(siteName, siteURL){

    //ako je prazan formular - RETURN FALSE DA PREKINE THREAD!
    if(!siteName || !siteURL){
        alert('Unesi nešto!');
        return false;
    }

    //regex to forum URL!
    var expression = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
    var regex = new RegExp(expression);

    if(!siteURL.match(regex)){
        alert('Unesi valjan url!');
        return false;
    }

    //ako prođe sve validacije vrati true - true znači da moze nasaviti s izvođenjem koda
    return true;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////









class Utillity {

static bigLabel(){

        let l = document.getElementsByTagName('label');
        for(let i = 0; i < l.length; i++){
            l[i].classList.add('bigger');
        }
    }

static erase(){
    let siteName = document.getElementById('siteName').value = '';
    let siteURL = document.getElementById('siteURL').value = '';
}

}


Utillity.bigLabel();


</script>

<style>

.bigger{
    font-size: 1.6rem;
}
</style>

@endsection
