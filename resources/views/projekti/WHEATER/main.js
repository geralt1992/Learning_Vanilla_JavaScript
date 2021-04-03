const apiKey = `cef1fc91358b9454b8bf4a60265a2086`;
const icon = document.querySelector('img');
const temDesc = document.querySelector('.temperature-description');
const temDeg = document.querySelector('.temperature-degree');
const locationTimezone = document.querySelector('.location-timezone');
const temSection = document.querySelector('.temperature');
const temSpan = document.querySelector('.temperature span');
const body = document.querySelector('body');
const hourList = document.getElementById('hourList');

window.addEventListener('load' , () => {

    //ugrađeno u browser, da ti automatski očita lokaciju JEBENO!
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition( (position) => {
            let lon = position.coords.longitude;
            let lat = position.coords.latitude;
            let url = `http://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=${apiKey}`;
            fetch(url)
                .then( (res) => res.json())
                .then( (data) => {
                   // console.log(data);
                    let temperature = temDeg.textContent = data.main.temp;
                    locationTimezone.textContent = data.name;
                    temDesc.textContent = data.weather[0].description;
                    icon.src = `http://openweathermap.org/img/wn/${data.weather[0].icon}.png`;

                    //formula for celsius
                    let farenh = (temperature * (9/5)) + 32;

                    temSection.addEventListener('click' , () => {
                        if(temSpan.textContent === 'C'){
                            temSpan.textContent = 'F';
                            temDeg.textContent = Math.floor(farenh);
                        }else{
                            temSpan.textContent = 'C';
                            temDeg.textContent = temperature;
                        }
                    });
                })
                .catch( e => console.log(e));

            //HOURLY PREDICTION
                let urlHourly = `https://api.openweathermap.org/data/2.5/onecall?lat=45.33&lon=18.41&units=metric&appid=${apiKey}`
                fetch(urlHourly)
                    .then( (res) => res.json())
                    .then( (data) => {

                        for(let i = 0; i < 24; i++){
                            let oneHourEntery = data.hourly[i];

                            let oneTimeData = data.hourly[i].dt;
                            let date = new Date(oneTimeData * 1000);
                            let hours = date.getHours();

                                if(hours === 7 || hours === 9 || hours === 13 ||hours === 15 ||hours === 16 ||hours === 22){
                                    let card = document.createElement('card');
                                    card.style.opacity = .9;
                                    card.style.fontWeight = 600;
                                    card.innerHTML = `
                                    <div class="col m2">
                                        <div class="card" style="background: black; opacity: .6">
                                            <div class="card-content white-text">
                                                <span class="card-title">${hours} Hours</span>
                                                <ul>
                                                    <li>Temperatura:${oneHourEntery.temp} C </li>
                                                    <li>Vrijeme: ${oneHourEntery.weather[0].description} </li>
                                                    <li><img src="http://openweathermap.org/img/wn/${oneHourEntery.weather[0].icon}.png" /></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    `;
                                    hourList.appendChild(card);
                                }
                            }
                    })
                    .catch( e => console.log(e));

        });
    }else{
        h1.textContet = 'Please enable location to web!';
    }
});



function searchTown() {

    let input = document.querySelector('input');

    input.addEventListener('input' ,  (e) => {

        let city = e.target.value;
        let url = `http://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`;

        fetch(url)
        .then( (res) => res.json())
        .then( (data) => {
            console.log(data);
            let temperature = temDeg.textContent = data.main.temp;
            locationTimezone.textContent = data.name;
            icon.src = `http://openweathermap.org/img/wn/${data.weather[0].icon}.png`;

            temDesc.textContent = data.weather[0].description;
                if(temDesc.innerText === "clear sky"){
                    body.style.backgroundImage =  ' url("./img/clearSky.jpg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = '100% 100%';
                }else if(temDesc.innerText === "few clouds" || temDesc.innerText === 'overcast clouds'){
                    body.style.backgroundImage =  'linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)) , url("./img/fewClouds.jpg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = '100% 100%';
                }else if(temDesc.innerText === "scattered clouds"){
                    body.style.backgroundImage =  'linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)) , url("./img/scatterdClouds.jpg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = '100% 100%';
                }else if(temDesc.innerText === "broken clouds"){
                    body.style.backgroundImage =  'linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)) , url("./img/brokenClouds.jpg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = '100% 100%';
                }else if(temDesc.innerText === "shower rain" || temDesc.innerText === 'moderate rain' || temDesc.innerText === 'light rain'){
                    body.style.backgroundImage =  'linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)) , url("./img/lightRain.jpg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = '100% 100%';
                }else if(temDesc.innerText === "rain" || temDesc.innerText === 'very heavy rain' ){
                    body.style.backgroundImage =  'linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)) , url("./img/rain.jpg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = 'cover';
                }else if(temDesc.innerText === "thunderstorm"){
                    body.style.backgroundImage =  'linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)) , url("./img/thunderstorm.jpg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = '100% 100%';
                }else if(temDesc.innerText === "snow" || temDesc.innerText === 'light snow'){
                    body.style.backgroundImage =  'linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)) , url("./img/snow.jpg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = 'cover';
                }else if(temDesc.innerText === "mist" || temDesc.innerText === 'haze'){
                    body.style.backgroundImage =  'linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)) , url("./img/mist.jpeg")';
                    body.style.backgroundRepeat = 'no-repeat';
                    body.style.backgroundSize = 'cover';
                }else{
                    body.style.background = "linear-gradient(rgb(47, 150, 163), rgb(48, 62, 143))";
                }

            let farenh = (temperature * (9/5)) + 32;
            temSection.addEventListener('click' , () => {
                if(temSpan.textContent === 'C'){
                    temSpan.textContent = 'F';
                    temDeg.textContent = Math.floor(farenh);
                }else{
                    temSpan.textContent = 'C';
                    temDeg.textContent = temperature;
                }
                });
        })
        .catch( e => console.log(e));
    });
}

searchTown();
