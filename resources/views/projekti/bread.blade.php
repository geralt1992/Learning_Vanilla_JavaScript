@extends('master.master')

@section('content')




<h1>Relax me!</h1>


<div class="containerr">

    <div class="circle"></div>

    <p id="text"></p>

    <div class="pointer-container">
        <div class="pointer"></div>
    </div>

    <div class="gradient-cricle"></div>
</div>



<script>


    let container = document.querySelector('.containerr');
    let text = document.querySelector('#text');

    let totalTime = 13000;
    let breathTime = (totalTime / 5) * 2;
    let holdTime = totalTime / 5;


breathAnimation();


    function breathAnimation(){
        text.innerHTML = 'Breath In!';
        container.className = 'containerr grow';

        setTimeout(() => {
            text.innerText = 'Hold';

            setTimeout(() => {
                text.innerText = 'Breath Out';
                container.className = 'containerr shrink';
            }, holdTime);

        }, breathTime);
    }


    setInterval(breathAnimation, totalTime);


</script>



<style>

body{
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url("{{asset("img/bg3.jpg")}}");
    color: white;
    min-height: 100vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0;
}

.containerr{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 300px;
    width: 300px;
    margin: auto;
    position: relative;
    transform: scale(1);
}


.gradient-cricle{
    background: conic-gradient(
        #55b7a4 0%,
        #4ca493 40%,
        #fff 40%,
        #fff 60%,
        #336d62 60%,
        #2a5b52 100%
    );

    height: 320px;
    width: 320px;
    top: -10px;
    left: -10px;
    z-index: -2;
    border-radius: 50%;
    position: absolute;
}

.circle{
    background-color: #010f1c;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0%;
    z-index: -1;
    border-radius: 50%;
}

.pointer-container{
    position: absolute;
    top: -40px;
    left: 140px;
    width: 20px; 
    height: 190px;
    animation: rotate 13s linear forwards infinite;
    transform-origin: bottom center;
}

.pointer{
    background: #fff;
    border-radius: 50%;
    height: 20px;
    width: 20px;
    display: 20px;
}

.containerr.grow{
    animation: grow 5s linear forwards;
}

.containerr.shrink{
    animation: shrink 6s linear forwards;
}

@keyframes rotate{
    from {
        transform: rotate(0deg)
    }

    to {
        transform: rotate(360deg)
    }

}

@keyframes grow{
    from {
        transform: scale(1)
    }

    to {
        transform: scale(1.2)
    }
}


@keyframes shrink{
    from {
        transform: scale(1.2)
    }

    to {
        transform: scale(1)
    }
}
</style>

@endsection