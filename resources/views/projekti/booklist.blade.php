@extends('master.master')
@section('content')

<div class="container mt-4">

    <h1 id="iAmH" class="display-4 text-center">
        <i class="fas fa-book-open text-primary"></i>
        My <span class="text-primary">Book List</span>
    </h1>

        <form id="book-form">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" class="form-control">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="number" id="isbn" class="form-control">
            </div>

            <input type="submit" value="Add Book" class="btn btn-success btn-block mb-5">
        </form>


        <div class="form-group">
                <label for="search" class="mt-3">Search Book</label>
                <input type="text" id="search" class="form-control ml-5 mb-3" style="width: 50%; ">
        </div>


        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="book-list"></tbody>
        </table>


</div>



<script>






//book class
class Book {
    constructor($title, $author , $isbn){
        this.title = $title,
        this.author = $author,
        this.isbn = $isbn
    }
};

//ui class - handle ui tasks
class UI {


    static newBook(e){

        e.preventDefault();

        let newBookTitle = document.getElementById('title').value;
        let newBookAuthor = document.getElementById('author').value;
        let newBookISBN = document.getElementById('isbn').value;

        if(newBookTitle == '' || newBookAuthor == '' || newBookISBN == ''){
            UI.alertMe('Unesite sadržaj!' , 'danger');
        }else{

            for(let x = 0; x < localStorage.length; x++){

                let keyy = localStorage.key(x);
                let item = localStorage.getItem(keyy);
                let parsedItem = JSON.parse(item);

                if(parsedItem.isbn === newBookISBN ){
                    UI.alertMe('Ta knjiga već postoji!' , 'danger');
                    return false;
                }
            }

            let book = new Book(newBookTitle, newBookAuthor, newBookISBN );

            UI.addBookToList(book);
            UI.alertMe('Uspješno dodano' , 'primary');

            let time = Date.now();
            localStorage.setItem('knjiga'+ time , JSON.stringify(book));

        }
}


//metoda prikazi knjige
    static displayBook() {

    //go throught Lstorage, get i curent key, and items
        for( let i = 0; i < localStorage.length; i++){
            let key = localStorage.key(i);
            let send = localStorage.getItem(key);
            UI.addBookToList(JSON.parse(send));
        }
    }

//metoda dodaj knjige na listu
    static addBookToList(book){

    let a = document.getElementById('book-list');

    let row = document.createElement('tr')
    row.innerHTML = `
                    <td class="bookTitle">${book.title}</td>
                    <td class="author">${book.author}</td>
                    <td class="isbnn">${book.isbn}</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm delete">X</a>
                    </td>
                    `;

    a.appendChild(row);

    UI.clearFields();


    }

    //nakon unosa knjige očisti polja
    static clearFields(){

        document.getElementById('title').value = '';
        document.querySelector('#author').value = '';
        document.querySelector('#isbn').value = '';

    }

    //alert kreirani
    static alertMe(message, color){

        let nDiv = document.createElement('div');
        nDiv.classList.add(`alert` , `alert-${color}` , `mt-5` , `mb-5` );
        nDiv.innerHTML = message;
        nDiv.id = 'alertDiv';

        let placeToInsert = document.querySelector('#iAmH');
        placeToInsert.appendChild(nDiv);

        setTimeout( () => {
<<<<<<< HEAD
            nDiv.innerHTML = '';
            nDiv.classList.remove('alert');
=======
           nDiv.innerHTML = '';
           nDiv.classList.remove('alert');
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
        }, 2000);
    }


}


    class Utilities {
    //veći font labela - preko klase
    bbiggerLab(){

    let lab = document.getElementsByTagName('label');
    for(let v = 0; v < lab.length; v++){
        lab[v].classList.add('labelText');
    }
    }



    }
<<<<<<< HEAD
=======


>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3


    //bigger lab text font;
    let biggerLab = new Utilities;
    biggerLab.bbiggerLab();


    //events: search throught books
    document.getElementById('search').addEventListener('keyup' , (e) => {

<<<<<<< HEAD
    let searchedBook = e.target.value.toUpperCase();
=======
       let searchedBook = e.target.value.toUpperCase();
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3

        let allBooksTitles = document.getElementsByClassName('bookTitle');

        for(let i = 0; i < allBooksTitles.length; i++){

            let parentElementToHide = allBooksTitles[i].parentNode;

            if(allBooksTitles[i].textContent.toUpperCase().indexOf(searchedBook) !== -1 ) {
                parentElementToHide.style.display = '';
            } else{
                parentElementToHide.style.display = 'none';
            }
        }

    });



    //events: display books
    document.addEventListener('DOMContentLoaded' , UI.displayBook);

    //events: add book
    document.querySelector('.btn-block').addEventListener('click' , UI.newBook);

    //events: remove book
    document.addEventListener('DOMContentLoaded' , () => {

    let deleteB = document.getElementsByClassName('delete');

    for( let i = 0; i < deleteB.length; i++) {

        deleteB[i].addEventListener('click' , (e) => {

    //remove element and parents elements
        let Xbtn = e.target;
        Xbtn.parentNode.parentNode.parentNode.removeChild(Xbtn.parentNode.parentNode);

    //IZVUCI CLASS
        let UniqeISBN = Xbtn.parentNode.parentNode.getElementsByClassName('isbnn')[0].innerHTML;

    //prolazi kroz cijeli localStorage
        for( let i = 0; i < localStorage.length; i++){

        let key = localStorage.key(i);
        let item = localStorage.getItem(key);
        let parsed_item = JSON.parse(item) ;

            if(parsed_item.isbn === UniqeISBN){
                localStorage.removeItem(key);
                  UI.alertMe('Uspješno izbrisano!' , 'success');
                break
            }
        }
    });

    }

    }
);





</script>

<style>
    .labelText{
        font-size: 1.5rem !important;
    }
</style>

@endsection
