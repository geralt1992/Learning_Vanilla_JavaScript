//movment animatio to happen
const card = document.querySelector('.card');
const container = document.querySelector('.container');
//bonus
const title = document.querySelector('.title');
const sneaker = document.querySelector('.sneaker img');
const purchase = document.querySelector('.purchase button');
const description = document.querySelector('.info h3');
const sizes = document.querySelector('.sizes');

//moving ann event
container.addEventListener('mousemove' , (e) => {
    console.log('he')
    let xAxis = (window.innerWidth / 2 - e.pageX) /35;
    let yAxis = (window.innerHeight / 2 - e.pageY) / 35;
    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
});

//animation in
container.addEventListener('mouseenter' , (E) => {
    card.style.transition = 'none';

    //popuot effect
    sneaker.style.transform = 'translateZ(250px) rotateZ(-25deg)';
    title.style.transform = 'translateZ(100px)';

});

//animation out
container.addEventListener('mouseleave' , (e) => {
    card.style.transition = 'all 1s ease';
    card.style.transform = `rotateY(0deg) rotateX(0deg)`;

    sneaker.style.transform = 'translateZ(0px) rotateZ(0deg)';
    title.style.transform = 'translateZ(0px)';

});
