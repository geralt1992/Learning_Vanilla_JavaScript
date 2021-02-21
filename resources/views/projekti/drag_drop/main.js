const fill = document.querySelector('.fill');
const empties = document.querySelectorAll('.empty');

//fill listeners
fill.addEventListener('dragstart' , dragStart);
fill.addEventListener('dragend' , dragEnd);

//loop throught empties and call drag events

//when we dragover empti box we call dragOver function
for(const empty of empties){
    empty.addEventListener('dragover' , dragOver);
    empty.addEventListener('dragenter' , dragEnter);
    empty.addEventListener('dragleave' , dragLeave);
    empty.addEventListener('drop' , dragDrop);
}

//drag functions
function dragStart(){
    //this = fill element na kojem je e listener
    this.className += 'hold';
    setTimeout(() => {
        this.className = 'invisible'
    }, 0);


}

function dragEnd(){
    this.className = 'fill';
}



function dragOver(e){
    e.preventDefault();
}

function dragEnter(e){
    e.preventDefault();
    this.className += 'hoverd';
}

function dragLeave(e){
    e.preventDefault();
    this.className = 'empty';
}

function dragDrop(e){
    this.className = 'empty';
    this.append(fill);
}
