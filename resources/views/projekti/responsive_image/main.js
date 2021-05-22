const slides = document.querySelectorAll('.slide'); //node list, like array of all slides
const next = document.querySelector('#next');
const prev = document.querySelector('#prev');

const auto = true; //variable for automatic scrooling
const intervalTime = 5000 //time for automatic scrooling
let slideInterval; 

const nextSlide = () => {
    const current = document.querySelector('.current');
    //remove current class
    current.classList.remove('current');
    //check for next slide
    if(current.nextElementSibling){
        //add current to next sibling
        current.nextElementSibling.classList.add('current');
    }else{
        //add current to start - current klasa je vraćena na početak, kada prođe zadnji sibling
        slides[0].classList.add('current');
    }
    setTimeout(() => {
        current.classList.remove('current');
    });
}


const prevSlide = () => {
    const current = document.querySelector('.current');
    //remove current class
    current.classList.remove('current');
    //check for previous slide
    if(current.previousElementSibling){
        //add current to previous sibling
        current.previousElementSibling.classList.add('current');
    }else{
        //add current to last
        slides[slides.length - 1].classList.add('current');
    }
    setTimeout(() => {
        current.classList.remove('current');
    });
}


//button events 

next.addEventListener('click' , e => {
    nextSlide();
    if(auto) {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide , intervalTime)
    }
});

prev.addEventListener('click' , e => {
    prevSlide();
    if(auto) {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide , intervalTime)
    }
});


//auto scrool
if(auto){
    //run next slide at interval time
    slideInterval = setInterval(nextSlide , intervalTime)
}


