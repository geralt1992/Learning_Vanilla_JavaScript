const counters = document.querySelectorAll('.conuter'); //node list, like array, we can loop throught
const speed = 200;

counters.forEach( counter => {
    const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        //ovaj "+" je pretvorio stringse u number typese

        const count = +counter.innerText;

        const inc = target / speed;

        if(count < target){
            counter.innerText = count + inc;
            setTimeout(updateCount, 1)
        }else{
            count.innerText = target;
        }
    }

    updateCount();
});

