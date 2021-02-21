const current = document.querySelector('#current');

//querySelectoraLL( .imgages class and all images inside)
//queryselector all vraća node list = array treba loop
const imgs = document.querySelectorAll('.imgs img');
const opacity = 0.6;

//set first image opacity
imgs[0].style.opacity = opacity;

//svakoj ne odabranoj slici daš listner click, na klik na ne odabranu
//šalješ njen src na glavni prikaz src, tako da se ona kao otvori, ludilo!
imgs.forEach( img => img.addEventListener('click' , (e) => {

    //reset opacity of all imgs
    imgs.forEach( img => (img.style.opacity = 1));

    //promijeni sliku
    current.src = e.target.src

    //add animation class fadeIn
    current.classList.add('fade-in');

    //remove class after click
    setTimeout(() => current.classList.remove('fade-in'), 500);

    //change opacity
    e.target.style.opacity = opacity;
}));


