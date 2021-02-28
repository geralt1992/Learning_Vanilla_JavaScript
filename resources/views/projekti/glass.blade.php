@extends('master.master')

@section('content')


<!-- TRIKOVI IZ OVOG SU:

Glass see throught teme - linear gradient
objašnjeno kako se koristi flex (horizontalno!)
staviti na sredinu samo s margin: 20% auto;
STAVITI OBLIKE UNUTAR POZADINE ("CIRCLE") - aboluste i uštimavanje!

-->


<main>
    <section class="glass">
        <div class="dashboard">
            <div class="user">
                <img src="{{asset('img/avatar.png')}}" alt="">
                <h3>Marin Sabljo</h3>
                <p>Pro Member</p>
            </div>
            <div class="links">

                <div class="ink">
                <img src="{{asset('img/twitch.png')}}" alt="">
                <h2>Streams</h2>
                </div>

                <div class="ink">
                <img src="{{asset('img/steam.png')}}" alt="">
                <h2>Games</h2>
                </div>

                <div class="ink">
                <img src="{{asset('img/upcoming.png')}}" alt="">
                <h2>New</h2>
                </div>

                <div class="ink">
                <img src="{{asset('img/library.png')}}" alt="">
                <h2>Libary</h2>
                </div>
                <div class="pro">
                <h2>Join pro for free games</h2>
                    <img src="{{asset('img/controller.png')}}" alt="">
                </div>
            </div>
        </div>


    <div class="games">

        <div class="status">
            <h1>Active Games</h1>
            <input type="text">
        </div>

        <div class="cards">
            <div class="card">
                <img src="{{asset('img/assassins.png')}}" alt="">
                <div class="card-info">
                    <h2>Assassins Creed Valhalla</h2>
                    <p>PS5 Version</p>
                    <div class="progress"></div>
                </div>
                <h2 class="percentage">60%</h2>
            </div>

            <div class="card">
                <img src="{{asset('img/assassins.png')}}" alt="">
                <div class="card-info">
                    <h2>Assassins Creed Valhalla</h2>
                    <p>PS5 Version</p>
                    <div class="progress"></div>
                </div>
                <h2 class="percentage">60%</h2>
            </div>


            <div class="card">
                <img src="{{asset('img/assassins.png')}}" alt="">
                <div class="card-info">
                    <h2>Assassins Creed Valhalla</h2>
                    <p>PS5 Version</p>
                    <div class="progress"></div>
                </div>
                <h2 class="percentage">60%</h2>
            </div>
        </div>
    </div>
    </section>

</main>

<div class="circle1"></div>
<div class="circle2"></div>




<style>
/*FLEX STAVLJA SVE CHILD ELEMENTE IZ VERTIKALNOG U HORIZONTALAN POLOŽAJ*/

main{
    font-family: "Poppins" , sans-serif;
    min-height: 100vh;
    background: linear-gradient( to right top, #65dfc9, #6cdbeb);
    display: flex;
    align-items: center;
    justify-content: center;
}

h1{
    color: #426696;
    font-weight: 600;
    font-size: 3rem;
    opacity: .8;
}

h2{
    color: #658ec6;
    font-weight: 500;
    opacity: .8;
}

h3{
    color: #426696;
    font-weight: 600;
    opacity: .8;
}

.glass{
    background: white;
    min-height: 80vh;
    width: 60%;
    background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7) , rgba(255, 255, 255, 0.3));
    border-radius: 2rem;
    z-index: 2;
    backdrop-filter: blur(2rem);
    display: flex;
}

.circle1, .circle2{
    background: white;
    background: linear-gradient(to right bottom, rgba(255, 255, 255, .8) , rgba(255, 255, 255, 0.3));
    height: 20rem;
    width: 20rem;
    position: absolute;
    border-radius: 50%;
    z-index: 1;
}

.circle1{
    top: 5%;
    right: 15%;
    background:
}

.circle2{
    bottom: 5%;
    left: 10%;
}

/*flex 1 100% ekrana, i koliko imaš flexova na toliko posto dijeliš ekran */

.dashboard{
    flex: 1; /*100%*/
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    text-align: center;
    background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7) , rgba(255, 255, 255, 0.3));
    border-radius: 2rem;
}


.pro{
    background: linear-gradient( to right top, #65dfc9, #6cdbeb);
    border-radius: 2rem;
    color: white;
    display: flex;
    padding: 1rem;
    position: relative;
}

.pro img{
    position: absolute;
    top: -10%;
    right: 10%;
}

.link{
    display: flex;
    margin: 2rem 0rem;
    padding: 1rem 5rem;
    align-items: center;
}

.link h2{
    padding: 0rem 2rem;
}

.pro h2{
    color: white;
    width: 40%;
    font-weight: 600;
}


/*GAMES SECTION*/


.games{
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    margin: 5rem;
}

.status input{
    background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7) , rgba(255, 255, 255, 0.3));
    border: none;
    width: 50%;
    padding: .5 rem;
    border-radius: 50%;
}

.card{
    display: flex;
    background: linear-gradient(to left top, rgba(255, 255, 255, .8) , rgba(255, 255 , 255 , .5));
    border-radius: 1rem;
    margin: 2rem 0rem;
    padding: 2rem;
    box-shadow: 6px 6px 20px rgba(122, 122, 122, 0.212);
    justify-content: space-between;
}

.progress{
    background: linear-gradient( to right top, #65dfc9, #6cdbeb);
    width: 100%;
    height: 25;
    border-radius: 1rem;
    position: relative;
    overflow: hidden;
}

.progress::after{
    content: '';
    width: 100%;
    height: 100%;
    background: rgba(236, 236, 236);
    position: absolute;
    left: 60%;
}

.card-info{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.percentage{
    font-weight: bold;
    background: linear-gradient( to right top, #65dfc9, #6cdbeb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

</style>





























@endsection
