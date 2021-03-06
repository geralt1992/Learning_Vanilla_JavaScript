const countdown = document.querySelector('.countdown');

//set lunch date - ovo getTime() pretvara ovo u miliskunde
const launchDate = new Date('Jan 1, 2022 13:00:00').getTime();

//update every sec
const intvl = setInterval( () => {
    //get todas date and time (in miliseconds)
    const now = new Date().getTime();

    //distance from now to launch date
    const distance = launchDate - now;

    //time calculations
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60 )) / 1000);

    //display res
    countdown.innerHTML = `
        <div>${days}<span>Days</span></div>
        <div>${hours}<span>Hours</span></div>
        <div>${minutes}<span>Minutes</span></div>
        <div>${seconds}<span>Seconds</span></div>
    `;


    //if launch date passed
    if(distance < 0){
        //stop countdown
        clearInterval(intvl);
        //style and output text
        countdown.style.color = '#17a2b8';
        countdown.innerHTML = 'Launched';
    }
}, 1000)
