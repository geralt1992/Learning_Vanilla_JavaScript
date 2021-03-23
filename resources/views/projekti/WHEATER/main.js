window.addEventListener('load' , () => {
    let long;
    let lat;

    let temDesc = document.querySelector('.temperature-description');
    let temDeg = document.querySelector('.temperature.degree');
    let locationTimezone = document.querySelector('.location-timezone');
    let temSection = document.querySelector('.temperature');
    const temSpan = document.querySelector('.temperature span');

    //ugrađeno u browser, da ti automatski očita lokaciju JEBENO!
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition( (position) => {
            lon = position.coords.longitude;
            lat = position.coords.latitude;


            //ta spriječiti cors origin problem
            const proxy ='https://cors-anywhere.herokuapp.com/';
            const njegov_api = `${proxy}https://api.darksky.net/forecast/nešto=${lon}${lat}`;

            fetch(njegov_api)
            .then((res) => res.json())
            .then( (data) => {
                //iz njegovog apia, fora kao i s modulima, stvoriš si konst u zagradama koje se vuku iz data.curently
                const {temperature, summary, icon} = data.currently;
                //set DOM elements from the API
                temDeg.textContent = temperature;
                temDesc.textContent = summary;
                locationTimezone.textContent = data.timezone;

                //formula for celsius
                let celsius = (temperature - 32) * (5 / 9);

                //ivonke function od doje
                setIcons(icon , document.querySelector('.icon'));

                //set celsius with click
                temSection.addEventListener('click' , () => {
                    if(temSpan.textContent === 'F'){
                        temSpan.textContent = 'C';
                        temDeg.textContent = Math.floor(celsius);
                    }else{
                        temSpan.textContent = 'F';
                        temDeg.textContent = temperature;
                    }
                });
            });







            /*
            //od "open weather-a"
                const api = `cef1fc91358b9454b8bf4a60265a2086`;

            //napravi sovju izvedu s upisom grada ili trenutna lokacija
                let url = `http://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${api}`;
                let url2 = `http://api.openweathermap.org/data/2.5/weather?q=Berlin&APPID=cef1fc91358b9454b8bf4a60265a2086`;
                fetch(url)
                .then( (res) => res.json())
                .then( (data) => {
                    console.log(data);
                })
                .catch( e => console.log(e));
            */
        });





    }else{
        h1.textContet = 'Please enable location to web!';
    }



    function setIcons(icon, iconID){
        const skycones = new Skycone({color: "white"});
        //u tom njegovom apiu ima bas predvidjeno za icone iz objekta
        //ali u tom api dodju s minusom izmedju, a treba biti underscore ispod, replace trazi svaku liniju i mijenja "-" s "_"
        //treba i prebaciti u uppercase
        const curentIcon = icon.replace(/-/g, "_").toUpperCase();
        skycone.play();
        return skycones.set(iconID, skycons[curentIcon]);
    }
});
//  https://openweathermap.org/current
