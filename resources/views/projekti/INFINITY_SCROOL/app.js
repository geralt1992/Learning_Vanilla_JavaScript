const URL = 'http://api.adorable.io/avatars/';
const container = document.getElementById('container');

function getRanNum(){
   return Math.floor(Math.random() * 100);
}


function loadImages(numImages = 10) {
let i = 0;
    while(i < numImages){
        const img = document.createElement('img');
        img.src = `${URL}${getRanNum()}}`;
        container.innerHTML = img;
        i++;
    }
}

loadImages()



window.addEventListener('scroll' , () => {
    if(window.scrollY + window.innerHeight   >= document.documentElement.scrollHeight) {
        loadImages();
    }
})
